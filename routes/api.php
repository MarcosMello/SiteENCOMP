<?php

use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testEvent', function () {
    //dd(\App\API\Sympla\SymplaAPI::getAllFromEndpoint(\App\API\Sympla\SymplaAPI::getParticipantsURL(2172919)));
    dd(App\API\Sympla\client::get("v4/events"));
});
