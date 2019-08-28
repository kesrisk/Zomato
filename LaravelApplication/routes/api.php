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

    Route::get('address', 'UserController@address');

    Route::post('address', 'UserController@addAddress');

    Route::get('carts/{restaurant_id}', 'CartController@index');

    Route::post('carts/{restaurant_id}/{cuisine_id}', 'CartController@addToCart');

    Route::post('orders/place/{restaurant_id}', 'OrderController@store');

    Route::get('orders/', 'OrderController@index');

    Route::get('orders/{id}', 'OrderController@show');
});


Route::post('/cuisines', 'CuisineController@store');



Route::resource('restaurants', 'RestaurantController');
Route::get('/restaurants/{id}/cuisines', 'RestaurantController@cuisines');
Route::get('restaurants/{id}/address', 'RestaurantController@address');
Route::post('restaurants/{id}/review', 'RestaurantController@addReview');



Route::post('likes', 'LikeController@toggleLike');

Route::post('comments', 'CommentController@store');

Route::post('attachments', 'AttachmentController@store');
