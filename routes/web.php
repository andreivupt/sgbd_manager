<?php


Route::get('/', 'PatrimonyController@home')->name('home');

Route::resource('patrimony', 'PatrimonyController');

Route::get('index', 'PatrimonyController@index')->name('index');
Route::get('index-logs', 'PatrimonyController@logs')->name('log');
Route::get('checkpoint', 'PatrimonyController@checkpoint')->name('checkpoint');
Route::get('commit', 'PatrimonyController@commit')->name('commit');
