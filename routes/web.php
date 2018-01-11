<?php

/**
* Web routes
*/

Auth::routes();

Route::get('/', 'ComingSoonController@show');
Route::post('/', 'ComingSoonController@saveMailAddress');

Route::get('map/{userId}/{id}', 'MapController@show');