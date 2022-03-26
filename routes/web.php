<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {return view('welcome');});

// Страница категорий
Route::get('/category', [CategoryController::class, 'index'])->name('category');

// Страница новостей конкретной категории
Route::get('/category/{category_id}/news', [NewsController::class, 'index'])->name('categoryNews');

// Страница отдельной новости
Route::get('/category/{category_id}/news/{id}', [NewsController::class, 'show'])->where('id', '\d+')->name('showNews');

// Страница добавления новости
Route::get('/news_add', [NewsController::class, 'addNews'])->name('add_news');
Route::get('/about', [NewsController::class, 'about'])->name('about');
Route::get('/discover', [NewsController::class, 'discover'])->name('discover');

//Route::get('/user/{username}', function (string $username) {return "Добро пожаловать в мой проект, {$username}";});
//Route::get('/info', function () {return "Здесь будет располагаться информация о будущем проекте.";});



