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


Route::post('register', 'userController@register');
Route::post('login', 'userController@login');

Route::resource('restaurants', 'RestaurantController');
Route::get('restaurants/{id}/address', 'RestaurantController@address');
Route::post('restaurants/{id}/attach', 'RestaurantController@addAttachment');
Route::post('restaurants/{id}/review', 'RestaurantController@addReview');



Route::post('attachments/{id}/comment', 'AttachmentController@storeComment');
Route::post('attachments/{id}/like', 'AttachmentController@toggleLike');
