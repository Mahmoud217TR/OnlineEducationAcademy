<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('createAdmin', function () {
    if(User::where("username","Admin")->orWhere("email","Admin@test.com")->get()->count()){
        $this->comment('Admin Exist!!');
    }else{
        $this->comment('Creating Admin...');
        $user = User::create([
            'username' => "Admin",
            'email' => "Admin@test.com",
            'password' => Hash::make("12345678"),
            'gender' => "1",
            'birthdate' => "1-1-2000",
            'admin' => "1",
        ]);
        $this->comment('Admin Created');
    }
})->purpose('Testing');
