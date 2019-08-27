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
Route::middleware(['auth:api'])->get('address', 'UserController@address');
Route::middleware(['auth:api'])->post('address', 'UserController@addAddress');
Route::middleware(['auth:api'])->post('carts', 'CartController@addToCart');




Route::resource('restaurants', 'RestaurantController');

Route::get('/restaurants/{id}/cuisines', 'RestaurantController@cuisines');
Route::get('restaurants/{id}/address', 'RestaurantController@address');
// Route::post('restaurants/{id}/attach', 'RestaurantController@addAttachment');
Route::post('restaurants/{id}/review', 'RestaurantController@addReview');



// Route::post('attachments/{id}/comment', 'AttachmentController@storeComment');
// Route::post('attachments/{id}/like', 'AttachmentController@toggleLike');



// Route::post('review/{id}/comment', 'ReviewController@storeComment');
// Route::post('review/{id}/like', 'ReviewController@toggleLike');


Route::post('likes', 'LikeController@toggleLike');

Route::post('comments', 'CommentController@store');

Route::post('attachments', 'AttachmentController@store');
