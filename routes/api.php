<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->resource('locations', 'LocationsController');

Route::middleware('auth:api')->resource('location-sharings', 'LocationSharingsController')->only(['index', 'store', 'destroy']);

// // create tracking id
// Route::middleware('auth:api')->post('tracking/toggle', 'TrackingController');

// // get tracking id
// Route::middleware('auth:api')->get('tracking/toggle', 'TrackingController');

// // disable tracking id (soft delete)
// Route::middleware('auth:api')->delete('tracking/toggle', 'TrackingController');

// // gets the current tracking id
// ->get('tracking')


// Tracking: App hat einen Knopf mit dem man das Sharing der Karte aktivieren / deaktivieren kann
// 1. Aktivierung erzeugt neue Tracking ID
// 2. Deaktivierung macht alle Tracking IDs des Users ungültig
// 3. Reaktivierung erzeugt eine neue Tracking ID