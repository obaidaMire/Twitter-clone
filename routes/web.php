<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('lang/{lang}', function ($lang) {
    App::setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('idea.index');
})->name('lang');


Route::get('/', function () {
    return redirect()->route('idea.index');
});

Route::resource('idea', IdeaController::class)->except(['create','index','show'])
->middleware('auth');
Route::resource('idea', IdeaController::class)->only(['index','show']);
Route::post('ideas/{idea}/comments', [CommentController::class, 'store'])->name('comment.store')
->middleware('auth');

Route::resource('users',UserController::class)->only(['show']);
Route::resource('users',UserController::class)->only(['edit','update'])
->middleware('auth');

Route::post('users/{user}/follow', [UserController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [UserController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');


Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('idea.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('idea.unlike');


Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function () {
Route::get('/', [DashboardController::class,'index'])->name('dashboard');
Route::get('/users', [DashboardController::class,'users'])->name('users');
Route::get('/ideas', [DashboardController::class,'ideas'])->name('ideas');
Route::get('/comments', [DashboardController::class,'comments'])->name('comments');
Route::get('/comments/{comment}', [DashboardController::class,'CommentDelete'])->name('comments.delete');
Route::get('/users/{user}', [DashboardController::class,'UserDelete'])->name('users.delete');
});




Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('login.store');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
