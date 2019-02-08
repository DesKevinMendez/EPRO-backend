<?php

use Illuminate\Http\Request;

Route::group([
    'prefix' => 'auth',
    'namespace' => 'jwt',
    'middleware'=>['api', 'cors']
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});
