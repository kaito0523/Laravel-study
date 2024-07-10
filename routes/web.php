<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/hello', function () {
    return view('hello',[
        'name' => '山田',
        'course' => 'Laravel'
    ]);
});

Route::get('/', fn() => view('index'));