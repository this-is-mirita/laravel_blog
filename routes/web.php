<?php

use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminMainController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryController;

use Illuminate\Support\Facades\Route;
// vue start page
Route::get('/', function () {
    return view('index'); // Название blade-файла
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::name('main.')->group(function () {
        Route::get('/', AdminMainController::class)->name('index');
    });

    Route::name('category.')->prefix('categories')->group(function () {
        Route::get('/', AdminCategoryController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{category}', ShowController::class)->name('show');
        Route::get('/{category}/edit', EditController::class)->name('edit');
        Route::patch('/{category}', UpdateController::class)->name('update');
        Route::delete('/{category}', DeleteController::class)->name('delete');
    });
});


Auth::routes();



//Route::prefix('main')->name('main.')->group(function () {
//    Route::get('/', IndexController::class)->name('index');
//});
