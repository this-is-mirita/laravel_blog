<?php
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Admin\Main\IndexController as AdminMainController;

use App\Http\Controllers\Admin\Tag\IndexController as AdminTagController;
use App\Http\Controllers\Admin\Tag\CreateController as AdminTagCreateController;
use App\Http\Controllers\Admin\Tag\DeleteController as AdminTagDeleteController;
use App\Http\Controllers\Admin\Tag\EditController as AdminTagEditController;
use App\Http\Controllers\Admin\Tag\ShowController as AdminTagShowController;
use App\Http\Controllers\Admin\Tag\StoreController as AdminTagStoreController;
use App\Http\Controllers\Admin\Tag\UpdateController as AdminTagUpdateController;
use Illuminate\Support\Facades\Route;


// vue start page
Route::get('/', function () {
    return view('index'); // Название blade-файла
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::name('main.')->group(function () {
        Route::get('/', AdminMainController::class)->name('index');
    });

    Route::name('category.')->prefix('category')->group(function () {
        Route::get('/', AdminCategoryController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{category}', ShowController::class)->name('show');
        Route::get('/{category}/edit', EditController::class)->name('edit');
        Route::patch('/{category}', UpdateController::class)->name('update');
        Route::delete('/{category}', DeleteController::class)->name('delete');
    });

    Route::name('tag.')->prefix('tags')->group(function () {
        Route::get('/', AdminTagController::class)->name('index');
        Route::get('/create', AdminTagCreateController::class)->name('create');
        Route::post('/', AdminTagStoreController::class)->name('store');
        Route::get('/{tag}', AdminTagShowController::class)->name('show');
        Route::get('/{tag}/edit', AdminTagEditController::class)->name('edit');
        Route::patch('/{tag}', AdminTagUpdateController::class)->name('update');
        Route::delete('/{tag}', AdminTagDeleteController::class)->name('delete');
    });
});


Auth::routes();



//Route::prefix('main')->name('main.')->group(function () {
//    Route::get('/', IndexController::class)->name('index');
//});
