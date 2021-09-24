<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Interest;
use Illuminate\Http\Request;

class InterestsController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        $this->authorize('update',$user->profile);
        return view('/interests/show',['user' => $user]);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $this->authorize('update',$user->profile);
        return view('/interests/edit',['user' => $user]);
    }

    public function getInterestShow($id){
        $interest = Interest::findOrFail($id);
        $courses = Course::wherehas('interests',function($c) use ($interest){
            $c->where('interest_id',$interest->id);
        })->latest()->get();
        return view('showInterest',['interest' => $interest,'courses' => $courses]);
    }
}
