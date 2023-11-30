<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ReaderController;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\Presets\React;

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
    return view('admin.dashboard.index');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('role',RoleController::class);
Route::resource('user',UserController::class);
Route::resource('category',CategoryController::class);
Route::resource('author',AuthorController::class);
Route::resource('publisher',PublisherController::class);
// Route::resource('book',BookController::class);
Route::prefix('books')->controller(ReaderController::class)->name('books.')->group(function(){
    Route::get('/', 'index')->name('index')->middleware('permission:show-book');
    Route::post('/', 'store')->name('store')->middleware('permission:create-book');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-book');
    Route::get('/{book}', 'show')->name('show')->middleware('permission:show-book');
    Route::get('/{book}', 'update')->name('update')->middleware('permission:update-book');
    Route::get('/{book}', 'destroy')->name('destroy')->middleware('permission:delete-book');
    Route::get('/{book}/edit', 'edit')->name('edit')->middleware('permission:update-book');

});
// Route::resource('reader',ReaderController::class);
Route::prefix('readers')->controller(ReaderController::class)->name('readers.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/create', 'create')->name('create');
    Route::get('/{reader}', 'show')->name('show');
    Route::get('/{reader}', 'update')->name('update');
    Route::get('/{reader}', 'destroy')->name('destroy');
    Route::get('/{reader}/edit', 'edit')->name('edit');

});

