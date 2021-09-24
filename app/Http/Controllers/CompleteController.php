<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function complete(){

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

        Auth::user()->update($data2);

        if(!is_null(request('interests'))){
            foreach(request('interests') as $i){
                $interest = Interest::find($i);
                Auth::user()->interests()->toggle($interest);
            }
        }
        return redirect('/home');
    }
}
