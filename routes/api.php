<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/testing-the-api',function(){
    return response()->json(['message' => 'Hi the API is Working']);
});


// TODO 
// 1. Get All (GET)
// 2. Get a Single (GET)
// 3. Create (POST)
// 4. Update a Single (PUT/PATCH)
// 5. Delete (Delete)

// The API

Route::post('/create-user',[App\Http\Controllers\APIController::class, 'createUser']);
Route::post('/login',[App\Http\Controllers\APIController::class, 'login']);
Route::middleware('auth:api')->post('/me',[App\Http\Controllers\APIController::class, 'getMe']); // Testing Login
Route::middleware('auth:api')->post('/after-register',[App\Http\Controllers\APIController::class, 'afterRegister']); // Testing Login
Route::middleware('auth:api')->post('/search',[App\Http\Controllers\APIController::class, 'search']); // Search

// Courses
Route::middleware(['auth:api'])->group(function () {
    // To get Most Popular Courses
    Route::post('/most-popular-courses',[App\Http\Controllers\APIController::class, 'getMostPopular']); 

    // To get Similar Courses
    Route::post('/get-similar-courses',[App\Http\Controllers\APIController::class, 'getSimilar']);
    
    // To get My Courses
    Route::post('/get-my-courses',[App\Http\Controllers\APIController::class, 'getMyCourses']);

    // To get Courses of the Same Interests
    Route::post('/get-same-interest-courses',[App\Http\Controllers\APIController::class, 'getSameInterests']);

    // Get a Course
    Route::post('/get-course',[App\Http\Controllers\APIController::class, 'getCourse']);
});


// Interests
Route::middleware(['auth:api'])->group(function () {
    // To get all Interests
    Route::post('/get-all-interests',[App\Http\Controllers\APIController::class, 'getAllInterests']);

    // To get an Interests
    Route::post('/get-interests',[App\Http\Controllers\APIController::class, 'getInterest']); 

    // To get a Course Interests
    Route::post('/get-course-interests',[App\Http\Controllers\APIController::class, 'getCourseInterests']);

    // To get user Interests
    Route::post('/get-my-interests',[App\Http\Controllers\APIController::class, 'getMyInterest']); 

});

// User
Route::middleware(['auth:api'])->group(function () {
    // To Put a Course in Favorite Courses
    Route::post('/follow-course',[App\Http\Controllers\APIController::class, 'followCourse']);

    Route::post('/unfollow-course',[App\Http\Controllers\APIController::class, 'unfollowCourse']);

    Route::post('/check-course',[App\Http\Controllers\APIController::class, 'checkCourse']);

    Route::post('/increase-course',[App\Http\Controllers\APIController::class, 'viewIncrease']);

    Route::post('/profile-update',[App\Http\Controllers\APIController::class, 'profileUpdate']);

    Route::post('/pass-update',[App\Http\Controllers\APIController::class, 'updatePass']);

    // To get all Interests
    Route::post('/get-all-interests',[App\Http\Controllers\APIController::class, 'getAllInterests']);

    // To get an Interests
    Route::post('/get-interests',[App\Http\Controllers\APIController::class, 'getInterest']); 

    // To get a Course Interests
    Route::post('/get-course-interests',[App\Http\Controllers\APIController::class, 'getCourseInterests']);

    // To get my Interests
    Route::post('/get-my-interests',[App\Http\Controllers\APIController::class, 'getMyInterests']);

    // To mdifiy my Interests
    Route::post('/modify-my-interests',[App\Http\Controllers\APIController::class, 'modifyMyInterests']);

});
    

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
