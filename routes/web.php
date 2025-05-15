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

use App\Http\Controllers\Admin\Post\IndexController as AdminPostController;
use App\Http\Controllers\Admin\Post\CreateController as AdminPostCreateController;
use App\Http\Controllers\Admin\Post\DeleteController as AdminPostDeleteController;
use App\Http\Controllers\Admin\Post\EditController as AdminPostEditController;
use App\Http\Controllers\Admin\Post\ShowController as AdminPostShowController;
use App\Http\Controllers\Admin\Post\StoreController as AdminPostStoreController;
use App\Http\Controllers\Admin\Post\UpdateController as AdminPostUpdateController;

use App\Http\Controllers\Admin\User\IndexController as AdminUserController;
use App\Http\Controllers\Admin\User\CreateController as AdminUserCreateController;
use App\Http\Controllers\Admin\User\DeleteController as AdminUserDeleteController;
use App\Http\Controllers\Admin\User\EditController as AdminUserEditController;
use App\Http\Controllers\Admin\User\ShowController as AdminUserShowController;
use App\Http\Controllers\Admin\User\StoreController as AdminUserStoreController;
use App\Http\Controllers\Admin\User\UpdateController as AdminUserUpdateController;



use App\Http\Controllers\Personal\Main\IndexController as PersonalMainController;

use App\Http\Controllers\Personal\Liked\IndexController as PersonalLikedController;
use App\Http\Controllers\Personal\Liked\DeleteController as DeleteLikedController;

use App\Http\Controllers\Personal\Comment\DeleteController as PersonalDeleteCommentController;
use App\Http\Controllers\Personal\Comment\EditController as PersonalEditCommentController;
use App\Http\Controllers\Personal\Comment\IndexController as PersonalCommentController;
use App\Http\Controllers\Personal\Comment\UpdateController as PersonalUpdateCommentController;


use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Main\IndexController as MainController;
use App\Http\Controllers\Post\IndexController as PostIndexController;
use App\Http\Controllers\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Post\ShowController as MainShowController;
use App\Http\Controllers\Post\Comment\StoreController as StoreCommentController;
use App\Http\Controllers\Post\Like\StoreController as StoreLikeController;
use App\Http\Controllers\Category\Post\IndexController as CategoryPostIndexController;


Route::name('main.')->group(function () {
    Route::get('/', MainController::class)->name('index');
});
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', CategoryIndexController::class)->name('index');

    Route::prefix('{category}/posts')->name('category.')->group(function () {
        Route::get('/', CategoryPostIndexController::class)->name('index');
    });
});


Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', PostIndexController::class)->name('index');
    Route::get('/{post}', MainShowController::class)->name('show');
    //post/1/comments
    Route::prefix('{post}/comment')->name('comment.')->group(function () {
        Route::post('/', StoreCommentController::class)->name('store');
    });
    Route::prefix('{post}/likes')->name('likes.')->group(function () {
        Route::post('/', StoreLikeController::class)->name('store');
    });
});



Route::prefix('personal')->name('personal.')->middleware(['auth', 'verified'])->group(function () {
    Route::name('main.')->group(function () {
        Route::get('/', PersonalMainController::class)->name('index');
    });Route::name('liked.')->prefix('liked')->group(function () {
        Route::get('/', PersonalLikedController::class)->name('index');
        Route::delete('/{post}', DeleteLikedController::class)->name('delete');
    });Route::name('comment.')->prefix('comment')->group(function () {
        Route::get('/', PersonalCommentController::class)->name('index');

        Route::get('/{comment}/edit', PersonalEditCommentController::class)->name('edit');
       Route::patch('/{comment}', PersonalUpdateCommentController::class)->name('update');
        Route::delete('/{comment}', PersonalDeleteCommentController::class)->name('delete');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified'])->group(function () {
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
    Route::name('post.')->prefix('posts')->group(function () {
        Route::get('/', AdminPostController::class)->name('index');
        Route::get('/create', AdminPostCreateController::class)->name('create');
        Route::post('/', AdminPostStoreController::class)->name('store');
        Route::get('/{post}', AdminPostShowController::class)->name('show');
        Route::get('/{post}/edit', AdminPostEditController::class)->name('edit');
        Route::patch('/{post}', AdminPostUpdateController::class)->name('update');
        Route::delete('/{post}', AdminPostDeleteController::class)->name('delete');
    });
    Route::name('user.')->prefix('users')->group(function () {
        Route::get('/', AdminUserController::class)->name('index');
        Route::get('/create', AdminUserCreateController::class)->name('create');
        Route::post('/', AdminUserStoreController::class)->name('store');
        Route::get('/{user}', AdminUserShowController::class)->name('show');
        Route::get('/{user}/edit', AdminUserEditController::class)->name('edit');
        Route::patch('/{user}', AdminUserUpdateController::class)->name('update');
        Route::delete('/{user}', AdminUserDeleteController::class)->name('delete');
    });
});
Route::get('logout', [LoginController::class, 'logout']);

Auth::routes(['verify' => true]);



//Route::prefix('main')->name('main.')->group(function () {
//    Route::get('/', IndexController::class)->name('index');
//});
