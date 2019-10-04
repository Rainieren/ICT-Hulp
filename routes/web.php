<?php

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

use Illuminate\Support\Facades\Route;


//Hoofdpagina met alle posts
Route::get('/', 'PostController@index')->name('home');
Route::get('/vragen', 'PostController@showQuestions')->name('showQuestions');
Route::post('/vragen/create', 'PostController@store')->name('makePost')->middleware('must-be-confirmed');
Route::get('/vragen/{channel}', 'PostController@index');
Route::get('/vragen/{channel}/{post}', 'PostController@show');
Route::delete('/vragen/{channel}/{post}', 'PostController@destroy');
Route::post('/vragen/{channel}/{post}/replies', 'ReplyController@store')->name('addReply');
Route::patch('/replies/{reply}', 'ReplyController@update');
Route::delete('/replies/{reply}', 'ReplyController@destroy');

Route::post('/replies/{reply}/likes', 'LikesController@store')->middleware('must-be-confirmed');
Route::delete('/replies/{reply}/likes', 'LikesController@destroy');



Route::get('/aanbieders', 'CompanyController@index')->name('showCompanies');
Route::get('/aanbieders/{channel}/{CompanyPost}', 'CompanyController@show');

Route::get('/profiel/{user}', 'ProfileController@show')->name('showProfile');
Route::post('/gebruikers/{user}/avatar', 'UserController@storeAvatar')->middleware('auth')->name('avatar_path');


// TODO: Dit uncommenten voor email verificatie
//Route::post('posts', 'PostController@store')->middleware('must-be-confirmed');
Route::get('/register/confirm', 'Api\RegisterConfirmationController@index');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {

    Route::get('/adminpanel', 'AdminController@index')->name('adminpanel');

    Route::get('/adminpanel/berichten', 'AdminController@showBerichten')->name('showBerichten');

    Route::get('/adminpanel/berichten/edit/{post}', 'AdminController@editPost')->name('editPost');
    Route::patch('/adminpanel/berichten/update/{post}', 'AdminController@updatePost')->name('updatePost');
    Route::delete('/adminpanel/berichten/delete/{post}', 'AdminController@deletePost')->name('deletePost');


    Route::get('/adminpanel/gebruikers', 'AdminController@showGebruikers')->name('showGebruikers');
    Route::post('/adminpanel/gebruikers/maken', 'AdminController@makeUser')->name('makeUser');
    Route::get('/adminpanel/gebruikers/edit/{id}', 'AdminController@editGebruikers')->name('editUsers');
    Route::patch('/adminpanel/gebruikers/update/{id}', 'AdminController@updateUser')->name('updateUser');
    Route::delete('/adminpanel/gebruikers/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');

    Route::get('/adminpanel/reacties', 'AdminController@showReplies')->name('showReplies');

    Route::post('/adminpanel/berichten/kanaal/maken', 'AdminController@makeChannel')->name('makeChannel');
    Route::get('/adminpanel/kanalen', 'AdminController@showChannels')->name('showChannels');
    Route::delete('/adminpanel/kanalen/{channel}/delete', 'AdminController@deleteChannel')->name('deleteChannel');
    Route::patch('/adminpanel/kanalen/{channel}/edit', 'AdminController@editChannel')->name('editChannel');




    Route::get('/adminpanel/instellingen', 'AdminController@showSettings')->name('showSettings');

});

Route::get('logout', function() {
    Auth::logout();
    return redirect('/');
});


Auth::routes();

