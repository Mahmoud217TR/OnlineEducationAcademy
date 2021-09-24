<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Interest;
use App\Models\Message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search()
    {
        $search = request()->input('search');

        $courses = Course::where('title','LIKE',"%{$search}%")->orWhere('description','LIKE',"%{$search}%")->get();
        $authors = Course::where('author','LIKE',"%{$search}%")->get();
        $interests = Interest::where('name','LIKE',"%{$search}%")->pluck('id');;
        $CbyI = Course::wherehas('interests',function($c) use ($interests){
            $c->whereIn('interest_id',$interests);
        })->latest()->get();

        return view('search',['courses'=>$courses,'authors'=>$authors,'interests'=>$interests,'CbyI'=>$CbyI]);
    }


}
