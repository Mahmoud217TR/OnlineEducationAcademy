<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about','about')->name('about');
Route::view('/help','help')->name('help');
Route::view('/test','test')->name('test');
Route::view('/after_register','/auth/afterRegister')->middleware('auth','completed');
Route::patch('/complete_register',[App\Http\Controllers\CompleteController::class, 'complete'])->name('complete');
Route::view('/login_warning','warnings/login')->name('lwarning');
Route::get('/search/',[App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::post('/help/submit',[App\Http\Controllers\Controller::class, 'help']);
Route::get('/help/submited',[App\Http\Controllers\Controller::class, 'helped']);
Route::get('/android',[App\Http\Controllers\Controller::class, 'android']);
Route::get('/android/download',[App\Http\Controllers\Controller::class, 'download']);


// Should complete Register before enter
Route::middleware(['complete'])->group(function () {

    Route::patch('/profile/{id}/update',[App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}/edit',[App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit')->middleware('password.confirm');
    Route::get('/profile/{id}/passwordrest',[App\Http\Controllers\ProfilesController::class, 'pass'])->name('pass.show')->middleware('password.confirm');
    Route::post('/profile/{id}/updatepassword',[App\Http\Controllers\ProfilesController::class, 'updatepass'])->name('pass.update');
    //Route::get('/profile/{id}',[App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
    Route::get('/interests/{id}/edit',[App\Http\Controllers\InterestsController::class, 'edit'])->name('interests.edit');
    Route::get('/interests/{id}',[App\Http\Controllers\InterestsController::class, 'index'])->name('interests.show');
    Route::get('/Course/{id}/watch',[App\Http\Controllers\CoursesController::class, 'watch']);
    Route::get('/Course/{id}',[App\Http\Controllers\CoursesController::class, 'index']);
    Route::get('/interest/{id}',[App\Http\Controllers\InterestsController::class, 'getInterestShow']);
    
    
    

// Components:
    //Route::post('/follow/{id}',[App\Http\Controllers\FollowsController::class,'store']);
    Route::post('/interestedIn/{user_id}/{interest_id}',[App\Http\Controllers\FavoriteController::class,'store']);
    Route::post('/interestedInCourse/{user_id}/{course_id}',[App\Http\Controllers\CoursesController::class,'store']);

});

// Admins only:
Route::middleware(['complete','admin'])->group(function () {

    Route::get('/admins/panel',[App\Http\Controllers\AdminController::class, 'panel']);

    Route::get('/admins/add',[App\Http\Controllers\AdminController::class, 'add']);
    Route::get('/admins/edit/{cid}',[App\Http\Controllers\AdminController::class, 'editform']);
    Route::get('/admins/edit',[App\Http\Controllers\AdminController::class, 'edit']);
    Route::get('/admins/delete/{cid}',[App\Http\Controllers\AdminController::class, 'deletecon']);
    Route::get('/admins/delete',[App\Http\Controllers\AdminController::class, 'delete']);
    Route::get('/admins/edit_course_interests/{cid}',[App\Http\Controllers\AdminController::class, 'edit_course_interests']);

    Route::get('/admins/add_interest',[App\Http\Controllers\AdminController::class, 'add_interest']);
    Route::get('/admins/edit_interest/{iid}',[App\Http\Controllers\AdminController::class, 'editform_interest']);
    Route::get('/admins/edit_interest',[App\Http\Controllers\AdminController::class, 'edit_interest']);   
    Route::get('/admins/delete_interest/{iid}',[App\Http\Controllers\AdminController::class, 'deletecon_interest']);
    Route::get('/admins/delete_interest',[App\Http\Controllers\AdminController::class, 'delete_interest']);

    Route::get('/admins/addadmin',[App\Http\Controllers\AdminController::class, 'addadmin']);
    Route::get('/admins/removeadmin',[App\Http\Controllers\AdminController::class, 'removeadmin']);

    Route::get('/admins/helpbox',[App\Http\Controllers\AdminController::class, 'openhelpbox']);
    Route::get('/admins/helpbox/message/{mid}',[App\Http\Controllers\AdminController::class, 'openmessage']);
    Route::get('/admins/helpbox/unsee/{mid}',[App\Http\Controllers\AdminController::class, 'unseemessage']);
    Route::get('/admins/helpbox/delete/{mid}',[App\Http\Controllers\AdminController::class, 'deletemessage']);

    Route::post('/admins/add/submit',[App\Http\Controllers\AdminController::class, 'submitCourse']);
    Route::patch('/admins/edit/{cid}/submit',[App\Http\Controllers\AdminController::class, 'editCourse']);
    Route::delete('/admins/delete/{cid}/submit',[App\Http\Controllers\AdminController::class, 'deleteCourse']);

    Route::post('/admins/add_interest/submit',[App\Http\Controllers\AdminController::class, 'submitInterest']);
    Route::patch('/admins/edit_interest/{iid}/submit',[App\Http\Controllers\AdminController::class, 'editInterest']);
    Route::delete('/admins/delete_interest/{iid}/submit',[App\Http\Controllers\AdminController::class, 'deleteInterest']);

    Route::patch('/admins/addadmin/confirm',[App\Http\Controllers\AdminController::class, 'addadminconfirm']);
    Route::get('/admins/removeadmin/{uid}/confirm',[App\Http\Controllers\AdminController::class, 'removeadminconfirm']);


    // Components
    Route::post('/hasInterest/{course_id}/{interest_id}',[App\Http\Controllers\AdminController::class,'switchInterests']);
});


//Route::fallback(function (){return 'Something';});


