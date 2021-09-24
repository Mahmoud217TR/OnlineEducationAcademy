<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;
use App\Models\Interest;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;

class APIController extends Controller
{
    //
    public function createUser()
    {
        $data = request()->validate([
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function login()
    {
        $credentials = request()->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $token = auth('api')->attempt($credentials);
        if($token){
            if(!is_null(auth('api')->user()->gender))
                return response()->json(['token' => $token,'complete' => 'Completed']);
            else
                return response()->json(['token' => $token,'complete' => 'Not Completed']);
        }else{
            return response()->json(['message' => 'Credentials are Incorrect']);
        }
            
    }

    public function getMe()
    {
        $user = auth('api')->user();
        $interests = auth('api')->user()->interests()->pluck('interest_id');
        $ints = '';
        $index = 1;
        foreach($interests as $tmp){
            if($index < $interests->count()){
                $ints = $ints.$tmp.',';
            }else{
                $ints = $ints.$tmp;
            }
            $index = $index+1;
        }
        return response()->json(['user' => $user,'interests'=>$ints]);
    }

    public function afterRegister()
    {
        
        $data = request()->validate([
            'gender' => '',
            'interests' => '',
            'birthdate' => '',
            'profile_pic' => ['nullable','image'],
        ]);
            
        $image_path = null;

        if(!is_null(request('profile_pic'))){
            $image_path = request('profile_pic')->store('uploads','public');
        }

        $data2 = [
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],
            'profile_pic' => $image_path,
        ];

        auth('api')->user()->update($data2);

        if(!is_null(request('interests'))){
            // if it is string
            $ints = array_map('intval',explode(',',request('interests')));
            /* else use this
            $ints = request('interests');
            */
            foreach($ints as $i){
                $interest = Interest::findOrFail($i);
                auth('api')->user()->interests()->toggle($interest);
            }
        }
        return response()->json(['message' => 'Register Completed']);
    }

    public function search(){
        $search = request()->input('search');
        $user = auth('api')->user();

        $courses = Course::where('title','LIKE',"%{$search}%")->orWhere('description','LIKE',"%{$search}%")->get();
        $authors = Course::where('author','LIKE',"%{$search}%")->get();
        $interests = Interest::where('name','LIKE',"%{$search}%")->pluck('id');;
        $CbyI = Course::wherehas('interests',function($c) use ($interests){
            $c->whereIn('interest_id',$interests);
        })->latest()->get();

        //$courses = Course::whereIn(,$courses)->get();
        $ints = Interest::whereIn('id',$interests)->get();

        return response()->json([
            'courses' => $courses,
            'authors' => $authors,
            'interests' => $ints,
            'coursesByInterests' => $CbyI,
            ]);
    }

    // for Courses 

    public function getMostPopular()
    {
        return Course::getMostPopular();
    }

    public function getSimilar(){
        $cid = request('cid');
        $course = Course::find($cid);
        if($course){
            $ints = $course->interests()->pluck('interest_id');
            $courses = Course::wherehas('interests',function($c) use ($ints){
                $c->whereIn('interest_id',$ints)->where('course_id','<>',request('cid'));
            })->latest()->get();
            return $courses;
        }else{
            return response()->json(['message' => 'Wrong Course ID']);
        }
    }

    public function getSameInterests(){
        $ints = Auth('api')->user()->interests()->pluck('interest_id');
        $courses = Course::wherehas('interests',function($c) use ($ints){
            $c->whereIn('interest_id',$ints);
        })->latest()->get();
        return $courses;
    }

    public function getCourse(){
        $cid = request('cid');
        $course = Course::find($cid);
        if($course)
            return $course;
        else
            return response()->json(['message' => 'Course Not Found']);
    }

    public function getMyCourses(){
        $courses_ids = Auth('api')->user()->courses()->pluck('course_id');
        $courses = $courses = Course::whereIn('id',$courses_ids)->latest()->get();
        if($courses)
            return $courses;
        else
            return response()->json(['message' => 'No Courses Found']);
    }

    // Interests 

    public function getAllInterests(){
        $interests = Interest::all();
        if($interests)
            return $interests;
        else
            return response()->json(['message' => 'No Interests Found']);
    }

    public function getInterest(){
        $iid = request('iid');
        $interest = Interest::find($iid);
        if($interest)
            return $interest;
        else
            return response()->json(['message' => 'Interest Not Found']);
    }

    public function getMyInterests(){
        $interests = auth('api')->user()->interests()->pluck('interest_id');
        if($interests)
            return $interests;
        else
            return response()->json(['message' => 'No Interests Found']);
    }

    public function modifyMyInterests(){
        $old_interests = auth('api')->user()->interests()->pluck('interest_id');
        foreach($old_interests as $i){
            $interest = Interest::findOrFail($i);
            auth('api')->user()->interests()->detach($interest);
        }

        if(!is_null(request('interests'))){
            // if it is string
            $ints = array_map('intval',explode(',',request('interests')));
            /* else use this
            $ints = request('interests');
            */
            foreach($ints as $i){
                $interest = Interest::findOrFail($i);
                auth('api')->user()->interests()->attach($interest);
            }
        }
            return response()->json(['message'=>'interests modified']);
    }
    

    public function getCourseInterests(){
        $cid = request('cid');
        $course = Course::find($cid);
        if($course){
            $interests = $course->interests()->get();
            if($interests)
                return $interests;
            else
                return response()->json(['message' => 'No Interests Found']);
        }else{
            return response()->json(['message' => 'Course Not Found']);
        }
    }

    public function getMyInterest(){
        $interest = auth('api')->user()->interests()->get();
        if($interest)
            return $interest;
        else
            return response()->json(['message' => 'Interest Not Found']);
    }

    public function checkCourse(){
        $user = auth('api')->user();
        $course = Course::find(request('course_id'));
        if($user->courses()->where('course_id', $course->id)->exists()){
            return response()->json(['Course' => 1]);
        }else{
            return response()->json(['Course' => 0]);
        }
            
    }

    public function followCourse(){
        $user = auth('api')->user();
        $course = Course::find(request('course_id'));
        $user->courses()->attach($course);
        return response()->json(['message' => 'Course Followed']);
    }
    
    public function unfollowCourse(){
        $user = auth('api')->user();
        $course = Course::find(request('course_id'));
        $user->courses()->detach($course);
        return response()->json(['message' => 'Course Unfollowed']);   
    }

    public function viewIncrease(){
        $user = auth('api')->user();
        $course = Course::find(request('course_id'));
        $course -> veiws = $course -> veiws+1;
        $course->save();
        return response()->json(['Course' => $course]);   
    }

    public function profileUpdate(){
        
        $user = auth('api')->user();
        
        if(auth('api')->user()->username != request('username') && auth('api')->user()->email != request('email') ){
            $data = request()->validate([
                'username' => ['required', 'string', 'max:255','unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'gender' => '',
                'birthdate' => '',
                'profile_pic' => ['nullable','image'],
            ]);
        }else if(auth('api')->user()->username != request('username') && auth('api')->user()->email == request('email') ){
            $data = request()->validate([
                'username' => ['required', 'string', 'max:255','unique:users'],
                'gender' => '',
                'birthdate' => '',
                'profile_pic' => ['nullable','image'],
            ]);
        }else if(auth('api')->user()->username == request('username') && auth('api')->user()->email != request('email')){
            $data = request()->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'gender' => '',
                'birthdate' => '',
                'profile_pic' => ['nullable','image'],
            ]);
        }else{
            $data = request()->validate([
                'gender' => '',
                'birthdate' => '',
                'profile_pic' => ['nullable','image'],
            ]);
        }

        
        $image_path = null;

        if(!is_null(request('profile_pic'))){
            $image_path = request('profile_pic')->store('uploads','public');
        }else{
            if(!is_null(auth('api')->user()->profile_pic)){
                $image_path = auth('api')->user()->profile_pic;
            }
        }


        if(auth('api')->user()->username != request('username') && auth('api')->user()->email != request('email') ){
            $data2 = [
                'username' => $data['username'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'birthdate' => $data['birthdate'],
                'profile_pic' => $image_path,
            ];
        }else if(auth('api')->user()->username != request('username') && auth('api')->user()->email == request('email') ){
            $data2 = [
                'username' => $data['username'],
                'gender' => $data['gender'],
                'birthdate' => $data['birthdate'],
                'profile_pic' => $image_path,
            ];
        }else if(auth('api')->user()->username == request('username') && auth('api')->user()->email != request('email')){
            $data2 = [
                'email' => $data['email'],
                'gender' => $data['gender'],
                'birthdate' => $data['birthdate'],
                'profile_pic' => $image_path,
            ];
        }else{
            $data2 = [
                'gender' => $data['gender'],
                'birthdate' => $data['birthdate'],
                'profile_pic' => $image_path,
            ];
        }
        //dd($data2);

        auth('api')->user()->update($data2);
        
        return response()->json(['message' => 'Update Completed']);
    }

    public function updatePass(){
        $user = auth('api')->user();
        $data = request()->validate([
            'oldpassword' =>['required', 'string',new MatchOldPassword],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $data2 = [
            'password' => Hash::make($data['password']),
        ];
        $user->update($data2);
        return response()->json(['message' => 'Password Updated']);   
    }

    
}
