<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowReturnController;
use App\Http\Controllers\Admin\ReaderController;
use App\Models\BorrowReturnSlip;
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
Auth::routes();
// Route::middleware(['auth.redirect'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::resource('roles',RoleController::class);
        Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function(){
            Route::get('/', 'index')->name('index')->middleware('role:super-admin');
            Route::post('/', 'store')->name('store')->middleware('role:super-admin');
            Route::get('/create', 'create')->name('create')->middleware('role:super-admin');
            Route::get('/{role}', 'show')->name('show')->middleware('role:super-admin');
            Route::put('/{role}', 'update')->name('update')->middleware('role:super-admin');
            Route::get('/{role}', 'destroy')->name('destroy')->middleware('role:super-admin');
            Route::get('/{role}/edit', 'edit')->name('edit')->middleware('role:super-admin');

        });
    Route::resource('users',UserController::class);
    // Route::prefix('users')->controller(UserController::class)->name('users.')->group(function(){
    //     Route::get('/', 'index')->name('index')->middleware('role:super-admin');
    //     Route::post('/', 'store')->name('store')->middleware('role:super-admin');
    //     Route::get('/create', 'create')->name('create')->middleware('role:super-admin');
    //     Route::get('/{user}', 'show')->name('show')->middleware('role:super-admin');
    //     Route::put('/{user}', 'update')->name('update')->middleware('role:super-admin');
    //     Route::get('/{user}', 'destroy')->name('destroy')->middleware('role:super-admin');
    //     Route::get('/{user}/edit', 'edit')->name('edit')->middleware('role:super-admin');

    // });
    Route::resource('categories',CategoryController::class);
    // Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function(){
    //     Route::get('/', 'index')->name('index')->middleware('permission:show-category');
    //     Route::post('/', 'store')->name('store')->middleware('permission:create-category');
    //     Route::get('/create', 'create')->name('create')->middleware('permission:create-category');
    //     Route::get('/{category}', 'show')->name('show')->middleware('permission:show-category');
    //     Route::put('/{category}', 'update')->name('update')->middleware('permission:update-category');
    //     Route::get('/{category}', 'destroy')->name('destroy')->middleware('permission:delete-category');
    //     Route::get('/{category}/edit', 'edit')->name('edit')->middleware('permission:update-category');

    // });
     Route::resource('authors',AuthorController::class);
    // Route::prefix('authors')->controller(AuthorController::class)->name('authors.')->group(function(){
    //     Route::get('/', 'index')->name('index')->middleware('permission:show-author');
    //     Route::post('/', 'store')->name('store')->middleware('permission:create-author');
    //     Route::get('/create', 'create')->name('create')->middleware('permission:create-author');
    //     Route::get('/{author}', 'show')->name('show')->middleware('permission:show-author');
    //     Route::put('/{author}', 'update')->name('update')->middleware('permission:update-author');
    //     Route::get('/{author}', 'destroy')->name('destroy')->middleware('permission:delete-author');
    //     Route::get('/{author}/edit', 'edit')->name('edit')->middleware('permission:update-author');

    // });
    Route::resource('publishers',PublisherController::class);
    // Route::prefix('publishers')->controller(PublisherController::class)->name('publishers.')->group(function(){
    //     Route::get('/', 'index')->name('index')->middleware('permission:show-publisher');
    //     Route::post('/', 'store')->name('store')->middleware('permission:create-publisher');
    //     Route::get('/create', 'create')->name('create')->middleware('permission:create-publisher');
    //     Route::get('/{publisher}', 'show')->name('show')->middleware('permission:show-publisher');
    //     Route::put('/{publisher}', 'update')->name('update')->middleware('permission:update-publisher');
    //     Route::get('/{publisher}', 'destroy')->name('destroy')->middleware('permission:delete-publisher');
    //     Route::get('/{publisher}/edit', 'edit')->name('edit')->middleware('permission:update-publisher');

    // });
    Route::resource('books',BookController::class);
    // Route::prefix('books')->controller(BookController::class)->name('books.')->group(function(){
    //     Route::get('/', 'index')->name('index')->middleware('permission:show-book');
    //     Route::post('/', 'store')->name('store')->middleware('permission:create-book');
    //     Route::get('/create', 'create')->name('create')->middleware('permission:create-book');
    //     Route::get('/{book}', 'show')->name('show')->middleware('permission:show-book');
    //     Route::put('/{book}', 'update')->name('update')->middleware('permission:update-book');
    //     Route::get('/{book}', 'destroy')->name('destroy')->middleware('permission:delete-book');
    //     Route::get('/{book}/edit', 'edit')->name('edit')->middleware('permission:update-book');

    // });
    Route::resource('readers',ReaderController::class);
    Route::prefix('readers')->controller(ReaderController::class)->name('readers.')->group(function(){
        // Route::get('/', 'index')->name('index');
        // Route::post('/', 'store')->name('store');
        // Route::get('/create', 'create')->name('create');
        // Route::get('/{reader}', 'show')->name('show');
        // Route::put('/{reader}', 'update')->name('update');
        // Route::get('/{reader}', 'destroy')->name('destroy');
        // Route::get('/{reader}/edit', 'edit')->name('edit');
        Route::post('/extendCard/{reader}', 'extendCard')->name('extendCard');
        Route::post('/{id}/toggleStatus', 'toggleStatus')->name('toggleStatus');
    });

    Route::prefix('slips')->controller(BorrowReturnController::class)->name('slips.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/search', 'search')->name('search'); // Move this route before the dynamic parameter route
        Route::get('/{slip}', 'show')->name('show'); // Keep this route after the specific routes
        Route::get('/{slip}/edit', 'edit')->name('edit');
        Route::get('/{slip}/update', 'update')->name('update'); // Change the route name to avoid conflict
        Route::get('/{slip}/destroy', 'destroy')->name('destroy'); // Change the route name to avoid conflict
        Route::post('/extendCard/{slip}', 'extendCard')->name('extendCard');
        Route::post('/{id}/returnStatus', 'returnStatus')->name('returnStatus');
    });


    // Route::prefix('dashboards')->middleware(['auth'])->group(function() {
    //     Route::get('/', 'DashboardController@index')->name('dashboard.index');
    // });

    Route::prefix('dashboards')->controller(DashboardController::class)->name('dashboard.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/search', 'search')->name('search'); // Move this route before the dynamic parameter route
        Route::get('/{slip}', 'show')->name('show'); // Keep this route after the specific routes
        Route::get('/{slip}/edit', 'edit')->name('edit');
        Route::get('/{slip}/update', 'update')->name('update'); // Change the route name to avoid conflict
        Route::get('/{slip}/destroy', 'destroy')->name('destroy'); // Change the route name to avoid conflict
        Route::post('/extendCard/{slip}', 'extendCard')->name('extendCard');
        Route::post('/{id}/returnStatus', 'returnStatus')->name('returnStatus');
    });

// });

