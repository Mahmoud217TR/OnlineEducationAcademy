<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title','author','description','course_image','course','veiws'];

    public function interests(){
        return $this -> belongsToMany(Interest::class);
    }

    public function users(){
        return $this -> belongsToMany(User::class);
    }

    public function getSimilar(){
        // IMPORTATNT NOTE 1 -- if it Works DON'T touch it --
        // IMPORTATNT NOTE 2 -- if it Works DON'T touch it --
        // IMPORTATNT NOTE 3 -- JUST DON'T touch it --
        $ints = $this->interests()->pluck('interest_id');
        $courses = Course::wherehas('interests',function($c) use ($ints){
            $c->whereIn('interest_id',$ints)->where('course_id','<>',$this->id);
        })->latest()->get();
        return $courses;
    }

    public static function getMostPopular(){
        $courses = Course::orderBy('veiws','DESC')->get();
        return $courses;
    }

    public static function getSameInterests(){
        $ints = Auth::user()->interests()->pluck('interest_id');
        $courses = Course::wherehas('interests',function($c) use ($ints){
            $c->whereIn('interest_id',$ints);
        })->latest()->get();
        return $courses;
    }



}
