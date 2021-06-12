<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Middleware\CheckPassword;
// use App\Http\Middleware\CheckBanned;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;



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

//register
Route::post('registercustomer',[RegisterController::class,'registerCustomer']);
Route::post('registervendor',[RegisterController::class,'registerVendor']);
Route::post('logincustomer',[LoginController::class,'loginCustomer']);
Route::post('loginvendor',[LoginController::class,'loginVendor']);
Route::post('logout' , [LogoutController::class , 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//ratings
Route::get('/restaurants/{restaurant}/ratings', [RatingController::class, 'index'])->name('ratings.index');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/restaurants/{restaurant}/ratings', [RatingController::class, 'store']);
    Route::put('/restaurants/{restaurant}/ratings/{rating}', [RatingController::class, 'update']);
    Route::delete('/restaurants/{restaurant}/ratings/{rating}', [RatingController::class, 'destroy']);
});


//restaurants
Route::get("/restaurants", [RestaurantController::class, 'index']);
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::group(['middleware' => ['auth:sanctum','role:vendor']], function () {
    Route::post("/restaurants", [RestaurantController::class, 'store']);
    Route::put('restaurants/{restaurant}', [RestaurantController::class, 'update']);
    Route::delete('restaurants/{restaurant}', [RestaurantController::class, 'destroy']);
});


//menu_categories
Route::get('/restaurants/{restaurant}/menucategories', [MenuCategoryController::class, 'index'])->name('menucategories.index');
Route::get('/restaurants/{restaurant}/menucategories/{menucategory}', [MenuCategoryController::class, 'show'])->name('menucategories.show');
Route::group(['middleware' => ['auth:sanctum','role:vendor']], function () {
    Route::post('/restaurants/{restaurant}/menucategories', [MenuCategoryController::class, 'store']);
    Route::put('/restaurants/{restaurant}/menucategories/{menucategory}', [MenuCategoryController::class, 'update']);
    Route::delete('/restaurants/{restaurant}/menucategories/{menucategory}', [MenuCategoryController::class, 'destroy']);
});

//menu_items
Route::get('/restaurants/{restaurant}/menucategories/{menucategory}/menuitems', [MenuItemController::class, 'index'])->name('menuitems.index');
Route::group(['middleware' => ['auth:sanctum','role:vendor']], function () {
    Route::post('/restaurants/{restaurant}/menucategories/{menucategory}/menuitems', [MenuItemController::class, 'store']);
    Route::put('/restaurants/{restaurant}/menucategories/{menucategory}/menuitems/{menuitem}', [MenuItemController::class, 'update']);
    Route::delete('/restaurants/{restaurant}/menucategories/{menucategory}/menuitems/{menuitem}', [MenuItemController::class, 'destroy']);
});

//cart
Route::group(['middleware' => ['auth:sanctum','role:customer']], function () {
    Route::get('/restaurants/{restaurant}/carts/{cart}', [CartController::class, 'show'])->name('carts.show');
    // Route::post('/restaurants/{restaurant}/carts', [CartController::class, 'store']);
    // Route::put('/restaurants/{restaurant}/carts/{cart}', [CartController::class, 'update']);
    // Route::delete('/restaurants/{restaurant}/carts/{cart}', [CartController::class, 'destroy']);
});

//cart_items
Route::group(['middleware' => ['auth:sanctum','role:customer']], function () {
    Route::get('/restaurants/{restaurant}/carts/{cart}/cartitems', [CartItemController::class, 'index'])->name('cartitems.index');
    Route::post('/restaurants/{restaurant}/menuitems/{menuitem}/cartitems', [CartItemController::class, 'addToCart']);
    // Route::put('/restaurants/{restaurant}/menuitems/{menuitem}/cartitems/{cartitem}', [CartItemController::class, 'update']);
    Route::post('/restaurants/{restaurant}/menuitems/{menuitem}/carts/{cart}/cartitems/{cartitem}', [CartItemController::class, 'removeFromCart']);
    Route::delete('/restaurants/{restaurant}/carts/{cart}/cartitems/{cartitem}', [CartItemController::class, 'destroyCartItem']);
   
   
});

//sanctum
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






// Route::group(['middleware'=>['auth:sanctum']],function(){
//     Route::apiResource('/restaurants','App\Http\Controllers\RestaurantController');
//     Route::post('logout' , [LogoutController::class , 'logout']);
//     // Route::post('logoutcustomer' , [LogoutController::class , 'logoutCustomer']);
//     // Route::post('logoutvendor' , [LogoutController::class , 'logoutVenedor']);

// });

// Route::group(['middleware'=>['api','checkPassword'],'prefix'=>'restaurants'],function(){
//     Route::post('/{restaurant}/ratings','App\Http\Controllers\RatingController@index');
// });





