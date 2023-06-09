<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get("/", [MainController::class, "form"])->name('form');
Route::get("/about", function () {
    return 'О нас';
});
Route::post("/check", [MainController::class, "form_check"]);
Route::get("/test", function () {
    return view('test');
})->name('test');

Route::post(
    '/contact/submit',
    'App\Http\Controllers\ContactController@submit'
)->name('contact-form');

Route::get(
    '/test/all',
    'App\Http\Controllers\ContactController@allData'
)->name('contact-data');

Route::get(
    '/test/all/{id}',
    'App\Http\Controllers\ContactController@showOneMessage'
)->name('contact-data-one');

Route::get(
    '/test/all/{id}/update',
    'App\Http\Controllers\ContactController@updateMessage'
)->name('contact-update');

Route::post(
    '/test/all/{id}/update',
    'App\Http\Controllers\ContactController@updateMessageSubmit'
)->name('updateMessage');

Route::get(
    '/test/all/{id}/delete',
    'App\Http\Controllers\ContactController@deleteMessage'
)->name('contact-delete');

//для уроков катсод -  создание сайта новостей
Route::get(
    '/home',
    'App\Http\Controllers\IndexController@index'
)->name('home');

Route::get(
    '/posts',
    'App\Http\Controllers\PostController@index'
)->name('posts');

Route::get(
    '/posts/{id}',
    'App\Http\Controllers\PostController@show'
)->name('posts-show');

//роут для формы логина
Route::get(
    '/login',
    'App\Http\Controllers\AuthController@showLoginForm'
)->name('login');

Route::post(
    '/login_process',
    'App\Http\Controllers\AuthController@login'
)->name('login_process');

//роут для регистрации
Route::get(
    '/register',
    'App\Http\Controllers\AuthController@showRegisterForm'
)->name('register');

Route::post(
    '/register_process',
    'App\Http\Controllers\AuthController@register'
)->name('register_process');


//роут выхода
Route::get(
    '/logout',
    'App\Http\Controllers\AuthController@logout'
)->name('logout');

//группы мидлваров
Route::middleware('auth')->group(function () {
    Route::get(
    '/logout',
    'App\Http\Controllers\AuthController@logout'
)->name('logout');

    Route::post(
        '/posts/comment/{id}',
        'App\Http\Controllers\PostController@comment'
    )->name('comment');
});

Route::middleware('guest')->group(function () {
    Route::get(
        '/login',
        'App\Http\Controllers\AuthController@showLoginForm'
    )->name('login');

    Route::post(
        '/login_process',
        'App\Http\Controllers\AuthController@login'
    )->name('login_process');


    Route::get(
        '/register',
        'App\Http\Controllers\AuthController@showRegisterForm'
    )->name('register');

    Route::post(
        '/register_process',
        'App\Http\Controllers\AuthController@register'
    )->name('register_process');
});

Route::get('testAPI', 'App\Http\Controllers\MainController@testAPI');




