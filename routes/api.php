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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/restaurants','App\Http\Controllers\RestaurantController');

Route::group(['middleware'=>['auth:sanctum'],'prefix'=>'restaurants'],function(){
    Route::apiResource('/{restaurant}/ratings','App\Http\Controllers\RatingController');
});

// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);

//     return ['token' => $token->plainTextToken];
// });


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'first_name' => 'required',

    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->first_name)->plainTextToken;
});


// Route::group(['middleware'=>['api','checkPassword'],'prefix'=>'restaurants'],function(){
//     Route::post('/{restaurant}/ratings','App\Http\Controllers\RatingController@index');
// });





