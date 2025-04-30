<?php

use App\Http\Controllers\FakultasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Profil', function () {
    return view('Profil');
});

Route::resource('/fakultas', FakultasController::class);