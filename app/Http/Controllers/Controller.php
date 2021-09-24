<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Message;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function help(){
        $data = request()->validate([
            'title'=>'required | max:55',
            'email'=>'required | email',
            'message'=>'required',
        ]);

        $data2 = [
            'title'=>$data['title'],
            'email'=>$data['email'],
            'message'=>$data['message'],
            'seen'=> false,
        ];

        Message::create($data2);
        
        return redirect('/help/submited');
    }

    public function helped(){
        return view('helped');
    }

    public function android(){
        return view('androidapp');
    }

    public function download(){
        return response()->download('storage/android/app-debug.apk','OnlineEducationAcademy.apk');
    }
}
