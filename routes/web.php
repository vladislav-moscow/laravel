<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ParserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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

Route::get('/', function () {return view('welcome');});

// Страница категорий
Route::get('/category', [CategoryController::class, 'index'])->name('category');
// Страница новостей конкретной категории
Route::get('/category/{category_id}/news', [NewsController::class, 'index'])->name('categoryNews');
// Страница отдельной новости
Route::get('/category/{category_id}/news/{id}', [NewsController::class, 'show'])->where('id', '\d+')->name('showNews');
Route::resource('feedback', FeedbackController::class);
Route::resource('parser', ParserController::class);

Route::get('/about', [NewsController::class, 'about'])->name('about');
Route::get('/discover', [NewsController::class, 'discover'])->name('discover');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', AccountController::class)->name('index');
        Route::get('logout',  function () {
            Auth::logout();
            return redirect()-> route('login');
        });
    });

    // Admin route
    Route::group(['prefix'=> 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserController::class);
    });
});





//Route::get('/user/{username}', function (string $username) {return "Добро пожаловать в мой проект, {$username}";});
//Route::get('/info', function () {return "Здесь будет располагаться информация о будущем проекте.";});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
