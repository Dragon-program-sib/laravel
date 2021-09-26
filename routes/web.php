<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::get('/name/{name}', function(string $name) {
    return "Hello, {$name}!";
});

$text = 'Привет, Мир!';
$title = 'Laravel - Главная';
$content = 'Установка Laravel и окружения, прошла успешно. :)';

Route::get('/page', function () use ($text, $title, $content) {
    return <<<php
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>$title</title>
        </head>

        <body>
            <h1>$text</h1>
            <p>Здесь могла быть информация.</p>
            <p>Много информации.)</p>
            <p>$content</p>
        </body>

        </html>
    php;
});

// Admin.
Route::group(['prefix' =>'admin', 'as' => 'admin.'], function() {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});


// News.
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/collection', function() {
    $collect = collect([1,3,6,7,2,8,9,23,68,11,6]);
    dd($collect->max()); // We find the maximum number from the collection.
});
