<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Middleware\CheckPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // if (auth()->user()){
    //     auth()->user()->assignRole('vendor');
    // }
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum'],'prefix'=>'restaurants'],function(){
    Route::apiResource('/{restaurant}/ratings','App\Http\Controllers\RatingController');
});

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::apiResource('/restaurants','App\Http\Controllers\RestaurantController');

});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'id' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return $user->createToken($request->id)->plainTextToken;
});


// Route::group(['middleware'=>['api','checkPassword'],'prefix'=>'restaurants'],function(){
//     Route::post('/{restaurant}/ratings','App\Http\Controllers\RatingController@index');
// });





