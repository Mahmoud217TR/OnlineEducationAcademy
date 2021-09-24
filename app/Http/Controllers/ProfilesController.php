<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class ProfilesController extends Controller
{
    //
    public function index($id){
        $user = User::findOrFail($id);

        $follows = (auth()->user()) ? auth()->user()->following->contains($id): false;

        return view('/profile/show',['profile' => $user->profile,'follows' => $follows]);
    }

    public function edit($id){// for showing edit page
        $user = User::findOrFail($id);
        $this->authorize('update',$user->profile);
        return view('/profile/edit');
    }

    public function update($id){// for showing update profile
        $user = User::findOrFail($id);
        $this->authorize('update',$user->profile);

        
        if(auth::user()->username != request('username') && auth::user()->email != request('email') ){
            $data = request()->validate([
                'username' => ['required', 'string', 'max:255','unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'gender' => '',
                'birthdate' => '',
                'profile_pic' => ['nullable','image'],
            ]);
        }else if(auth::user()->username != request('username') && auth::user()->email == request('email') ){
            $data = request()->validate([
                'username' => ['required', 'string', 'max:255','unique:users'],
                'gender' => '',
                'birthdate' => '',
                'profile_pic' => ['nullable','image'],
            ]);
        }else if(auth::user()->username == request('username') && auth::user()->email != request('email')){
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
            if(!is_null(auth::user()->profile_pic)){
                $image_path = auth::user()->profile_pic;
            }
        }


        if(auth::user()->username != request('username') && auth::user()->email != request('email') ){
            $data2 = [
                'username' => $data['username'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'birthdate' => $data['birthdate'],
                'profile_pic' => $image_path,
            ];
        }else if(auth::user()->username != request('username') && auth::user()->email == request('email') ){
            $data2 = [
                'username' => $data['username'],
                'gender' => $data['gender'],
                'birthdate' => $data['birthdate'],
                'profile_pic' => $image_path,
            ];
        }else if(auth::user()->username == request('username') && auth::user()->email != request('email')){
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

        Auth::user()->update($data2);
        
        return redirect('/home');
    }

    public function pass($id){
        $user = User::findOrFail($id);
        $this->authorize('update',$user->profile);
        return view('/profile/passrest',['user' => $user]);
    }

    public function updatepass($id){
        $user = User::findOrFail($id);
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'oldpassword' =>['required', 'string',new MatchOldPassword],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $data2 = [
            'password' => Hash::make($data['password']),
        ];
        Auth::user()->update($data2);
        return redirect('/home');
    }

}
