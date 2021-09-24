<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Interest;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    // Routing Functions 

    public function panel(){
        return view('/admins/panel');
    }

    // ----- Courses -----

    public function add(){
        return view('/admins/add');
    }
    
    public function edit(){
        return view('/admins/edit');
    }

    public function editform($cid){
        $course = Course::findorfail($cid);
        return view('/admins/editform',['course'=>$course]);
    }
    
    public function delete(){
        return view('/admins/delete');
    }

    public function deletecon($cid){
        $course = Course::findorfail($cid);
        return view('/admins/deleteconfirm',['course'=>$course]);
    }

    public function edit_course_interests($cid){
        $course = Course::findorfail($cid);
        return view('/admins/course_interest_edit',['course'=>$course]);
    }

    // ----- Interests -----
    
    public function add_interest(){
        return view('/admins/add_interest');
    }
    
    public function edit_interest(){
        return view('/admins/edit_interest');
    }

    public function editform_interest($iid){
        $interest = Interest::findorfail($iid);
        return view('/admins/editform_interest',['interest'=>$interest]);
    }

    public function delete_interest(){
        return view('/admins/delete_interest');
    }

    public function deletecon_interest($iid){
        $interest = Interest::findorfail($iid);
        return view('/admins/deleteinterestconfirm',['interest'=>$interest]);
    }

    // ----- Admins -----

    public function addadmin(){
        return view('/admins/addadmin');
    }

    public function removeadmin(){
        return view('/admins/removeadmin');
    }

    // ----- Help Box  -----
    public function openhelpbox(){
        return view('/admins/help_box');
    }

    public function openmessage($mid){
        $message = Message::findorfail($mid);
        $data = ['seen'=>true];
        $message->update($data);
        return view('/admins/message_show',['message'=>$message]);
    }


    // Working Functions

    // ----- Courses -----

    public function submitCourse(){
        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'interest' => '',
            'course_image' => ['nullable','image'],
            'course' =>'mimes:mp4,mov,ogg,webm | required',
        ]);

        $image_path = null;

        if(!is_null(request('course_image'))){
            $image_path = request('course_image')->store('uploads','public');
        }

        $course_path = request('course')->store('uploads','public');
        $v = 0;
        $data2 = [
            'title' => $data['title'],
            'author' => $data['author'],
            'description' => $data['description'],
            'course_image' => $image_path,
            'course' => $course_path,
            'veiws' => $v,
        ];

        $course = Course::create($data2);

        if(!is_null(request('interests'))){
            foreach(request('interests') as $i){
                $interest = Interest::find($i);
                $course->interests()->toggle($interest);
            }
        }

        return redirect('/admins/panel');
    }

    public function editCourse($cid){
        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'course_image' => ['nullable','image'],
        ]);

        $course = Course::find($cid);
        $image_path = $course->course_image;

        if(!is_null(request('course_image'))){
            $image_path = request('course_image')->store('uploads','public');
        }


        $data2 = [
            'title' => $data['title'],
            'author' => $data['author'],
            'description' => $data['description'],
            'course_image' => $image_path,
        ];

        $course->update($data2);

        return redirect("/Course/".$course->id);
    }

    public function deleteCourse($cid){
        Course::find($cid)->delete();
        return redirect('/admins/panel');
    }

    public function switchInterests($course_id,$interest_id){
        $course = Course::findOrFail($course_id);
        $interest = Interest::find($interest_id);
        return $course->interests()->toggle($interest);
    }

    // ----- Interests -----

    public function submitInterest(){
        $data = request()->validate(['name' => ['required','unique:interests']]);
        $interest = Interest::create($data);
        return redirect('/interest/'.$interest->id);
    }

    public function editInterest($iid){

        $data = request()->validate(['name' => ['required','unique:interests']]);

        $interest = Interest::find($iid);
        

        $interest->update($data);

        return redirect("/interest/".$interest->id);
    }

    public function deleteInterest($iid){
        Interest::find($iid)->delete();
        return redirect('/admins/panel');
    }

    // ----- Admins -----

    public function addadminconfirm(){
        $uid = request()->id;
        $user = User::findOrFail($uid);
        
        request()->validate(['id' => ['numeric']]);
        $data = ['admin' => true];
        $user->update($data);
        return redirect('/admins/panel');
    }

    public function removeadminconfirm($uid){
        $user = User::findOrFail($uid);

        $data = ['admin' => false];
        $user->update($data);
        return redirect('/admins/panel');
    }

    // ----- Help Box  -----

    public function unseemessage($mid){
        $message = Message::findorfail($mid);
        $data = ['seen'=>false];
        $message->update($data);
        return redirect('/admins/helpbox');
    }

    public function deletemessage($mid){
        $message = Message::findorfail($mid);
        $message->delete();
        return redirect('/admins/helpbox');
    }
    
}
