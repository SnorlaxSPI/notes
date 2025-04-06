<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Hello World';
});

Route::get('/about', function () {
    echo 'About Us';
});

Route::get('/main', [MainController::class, 'index']);
