<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/autocomplete', [ViewController::class, 'search']);

Route::get('/index', [ViewController::class, 'index'])->name('index');

Route::get('/test', [ViewController::class, 'test'])->name('test');
