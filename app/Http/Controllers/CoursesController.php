<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index($id){
        $course = Course::findOrFail($id);
        return view('/courses/show',['course' => $course]);
    }

    public function store($user_id,$course_id){
        $user = User::findOrFail($user_id);
        $course = Course::find($course_id);
        
        if(is_null($course->veiws)){
            $v = 0;
        }else{
            $v = $course->veiws;
        }
        
        if($user->courses()->where('course_id', $course['id'])->exists()){
            $v = $v-1;
        }else{
            $v = $v+1;
        }

        $course -> veiws = $v;
        $course->update();
        return Auth::user()->courses()->toggle($course);
    }

    public function watch($id){
        $course = Course::findOrFail($id);
        $user = Auth::user();

        if(is_null($course->veiws)){
            $v = 0;
        }else{
            $v = $course->veiws;
        }

        if(!($user->courses()->where('course_id', $course['id'])->exists())){  
            $v = $v+1;
            $course -> veiws = $v;
            $course->update();
            Auth::user()->courses()->toggle($course);
        }

        return view('/courses/watch',['course' => $course]);
    }
}
