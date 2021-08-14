<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/config', 'ConfigController@index')->name('zoho_config');
Route::post('/config', 'ConfigController@post');

Route::group(['middleware' => ['zoho_config']], function () {
    Route::get('/deal/create', 'DealController@create')->name('deal_create');
    Route::post('/deal/create', 'DealController@store');

    Route::get('/job/create', 'JobController@create')->name('job_create');
    Route::post('/job/create', 'JobController@store');

    Route::get('/job/details', 'JobController@details')->name('job_details');
    Route::post('/job/details', 'JobController@detailsPost');

    Route::get('/job/result', 'JobController@result')->name('job_result');
    Route::post('/job/result', 'JobController@resultPost')->name('job_result');

    Route::get('/access-token', 'AccessTokenController@index')->name('access_token');
    Route::post('/access-token/generate', 'AccessTokenController@generate')->name('access_token_generate');
});

Route::get('/tokken-not-found', function () {
    return view('tokken-not-found');
})->name('tokken_not_found');
