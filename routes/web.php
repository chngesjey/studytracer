<?php

use App\Http\Controllers\AlumniAnswerController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SurveiController;
use Illuminate\Support\Facades\Auth;
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

Route::controller(HomeController::class)->as('landing.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contacts', 'contacts')->name('contacts');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/blog/{post:slug}', 'blog')->name('single_post');
});

// Auth::routes();
Route::controller(LoginController::class)->as('login.')->group(function () {
    Route::get('login', 'index')->name('index');
    Route::post('auth', 'authenticate')->name('auth');
});
Route::post('logout', function (\Illuminate\Http\Request $request) {
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'DashboarController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
    Route::controller(AlumniController::class)->as('alumni.')->group(function () {
        Route::get('alumni', 'index')->name('index');
        Route::post('alumni/store', 'store')->name('store');
        Route::get('alumni/{alumni}/edit', 'edit')->name('edit');
        Route::patch('alumni/{alumni}/update', 'update')->name('update');
        Route::delete('alumni/{alumni}/destroy', 'destroy')->name('destroy');
    });
    Route::resource('/question', QuestionController::class);
    Route::resource('/answer', AnswerController::class);
    Route::resource('/questionanswer', AlumniAnswerController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
    Route::controller(SurveiController::class)->as('survei.')->group(function () {
        Route::get('survei', 'index')->name('index');
        Route::post('survei/store', 'store')->name('store');
    });
    Route::controller(ChartController::class)->as('chart.')->group(function () {
        Route::get('chart/alumni', 'alumni')->name('alumni');
        Route::get('chart/umur', 'umur')->name('umur');
        Route::get('chart/jk', 'jk')->name('jk');
        Route::get('chart/jawaban', 'jawaban')->name('jawaban');
    });
});
