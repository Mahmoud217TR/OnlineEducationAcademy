<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function store($id){
        $profile = Profile::find($id);
        return Auth::user()->following()->toggle($profile);
    }
}
