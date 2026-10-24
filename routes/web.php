<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/client', function () {
    return view('client.index', ['title' => 'Clients List']);
});


Route::get('/client/create', function () {
    return view('client.create', ['title' => 'Client Create']);
});