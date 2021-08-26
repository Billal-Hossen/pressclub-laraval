<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin'],function (){
    Route::get('home',[AdminController::class, 'index'])->name('dashboard');
    Route::resource('tags', 'TagController');
    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');
    Route::resource('follower', 'FollowerController');
    Route::resource('social', 'SocialController');
    Route::resource('about', 'AboutController');
    Route::resource('images', 'ImageController');
    Route::resource('videos', 'VideoController');
    Route::resource('sliders', 'SliderController');
    Route::resource('posts', 'PostController');
    Route::resource('contacts', 'ContactController');
    Route::resource('comments', 'CommentController');
    Route::resource('users', 'UserController');
    Route::resource('settings', 'SettingController');
    Route::resource('executives', 'ExecutiveController');
    Route::resource('members', 'MemberController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('committees', 'CommitteeController');
    Route::resource('notices', 'NoticeController');
    Route::resource('campus', 'CampusController');
    Route::resource('publications', 'PublicationController');
    Route::resource('events', 'EventController');
});

//User route
/*Route::group(['as'=>'user.','prefix'=>'user', 'namespace'=>'User'],function (){
    Route::get('home',[UserController::class, 'index'])->name('dashboard');
});

Route::get('post/{id}', [HomeController::class, 'post'])->name('post');
Route::get('post', [HomeController::class, 'posts'])->name('allpost');
Route::get('post/category/{id}', [HomeController::class, 'catposts'])->name('categorypost');
Route::get('post/tag/{id}', [HomeController::class, 'tagposts'])->name('tagpost');
Route::get('post/user/{id}', [HomeController::class, 'userposts'])->name('userpost');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::post('search', [HomeController::class, 'search'])->name('search');
Route::post('contact/with_us', [HomeController::class, 'contact'])->name('contact');
Route::post('user/comment', [HomeController::class, 'getComment'])->name('getcomment');




View::composer('user.partial._footertop',function ($view){
    return $view->with(['tags'=>Tag::where('status','1')->orderBy('name')->get(), 'about'=>About::first(),'social'=>Social::first()]);
});

View::composer('user.partial._navigation',function ($view){
    return $view->with('categories', Category::where('status','1')->orderBy('name')->get());
});*/


Auth::routes();

Route::get('/', [HomeController::class, 'home'])->name('home');
