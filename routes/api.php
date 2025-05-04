<?php

use App\Http\Controllers\Vue\VueIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VueIndexController::class, 'index']);
