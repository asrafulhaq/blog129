<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('dashboard', function () {
    return view('admin.dashboard');
});



// Change user pass 
Route::get('password-change', 'App\Http\Controllers\Auth\ChangePasswordController@index')->name('password.change');
Route::post('password-change', 'App\Http\Controllers\Auth\ChangePasswordController@changePass')->name('change.user.pass');

// User profile settings
Route::get('user-profile-settings', 'App\Http\Controllers\Auth\UserProfileSettingsController@index')->name('user.profile.settings');
Route::post('user-profile-update', 'App\Http\Controllers\Auth\UserProfileSettingsController@userProfileUpdate')->name('user.profile.update');

// User Crud 
Route::resource('user', 'App\Http\Controllers\UserController');


// Role Crud 
Route::resource('role', 'App\Http\Controllers\RoleController');

// Tag routes 
Route::resource('tag', 'App\Http\Controllers\TagController');
Route::get('tag-status/{id}', 'App\Http\Controllers\TagController@tagStatus')->name('tag.status');



// Category routes 
Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::get('category-status/{id}', 'App\Http\Controllers\CategoryController@catStatus')->name('cat.status');



// Post routes 
Route::resource('post', 'App\Http\Controllers\PostController');
Route::get('post-status/{id}', 'App\Http\Controllers\PostController@postStatus')->name('post.status');


Route::get('haq', 'App\Http\Controllers\CategoryController@haq');


Route::get('blog', 'App\Http\Controllers\Comet\BlogPageController@showBlog');
Route::get('category-blog/{slug}', 'App\Http\Controllers\Comet\BlogPageController@showCategoryBlog')->name('category.blog');

Route::post('search-blog', 'App\Http\Controllers\Comet\BlogPageController@searchBlog')->name('search.blog');
