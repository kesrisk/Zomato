<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');



Route::middleware(['auth:api'])->group(function(){


    // User routes
    Route::get('user/address', 'UserController@address');
    Route::post('user/address', 'UserController@addAddress');
    Route::post('user/orders/place/{restaurant_id}', 'OrderController@store');
    Route::get('user/orders/', 'OrderController@index');
    Route::get('user/orders/{id}', 'OrderController@show');


    // Cart routes
    Route::get('carts/{restaurant_id}', 'CartController@index');
    Route::post('carts/{restaurant_id}/{cuisine_id}', 'CartController@addToCart');


    // reviews routes
    Route::get('reviews/{id}/like', 'ReviewController@likes');
    Route::get('reviews/{id}/comments', 'ReviewController@comments');
    Route::post('reviews/{id}/like', 'ReviewController@toggleLike');
    Route::post('reviews/{id}/comments', 'ReviewController@addComment');


    // promocode routes
    Route::get('promocode', 'PromocodeController@index');

    // attachment routes
    Route::get('attachments/{id}/like', 'AttachmentController@likes');
    Route::get('attachments/{id}/comments', 'AttachmentController@comments');
    Route::post('attachments/{id}/like', 'AttachmentController@toggleLike');
    Route::post('attachments/{id}/comments', 'AttachmentController@addComment');
});

// cuisines route
Route::post('cuisines', 'CuisineController@store');


// Restaurant routes
Route::resource('restaurants', 'RestaurantController');
Route::get('restaurants/{id}/cuisines', 'RestaurantController@cuisines');
Route::get('restaurants/{id}/address', 'RestaurantController@address');
Route::post('restaurants/{id}/review', 'RestaurantController@addReview');
