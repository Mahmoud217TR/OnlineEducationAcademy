<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Interest;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function store($user_id,$interest_id){
        $user = User::findOrFail($user_id);
        $this->authorize('update',$user->profile);
        $interest = Interest::find($interest_id);
        //return($user['id']." - ".$interest['id']);
        
        return Auth::user()->interests()->toggle($interest);
    }
}
