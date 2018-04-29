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

Route::get('/', 'ContentsController@index')->name('index');
Route::get('/diagnose', 'ContentsController@diagnose')->name('diagnose');
Route::get('/survey', 'ContentsController@survey')->name('survey');
Route::get('/no-depression', 'DiagnoseController@noDepression')->name('no-depression');

Route::post('/survey-main', 'SurveyController@survey')->name('survey-main');
Route::post('/survey-submit', 'SurveyController@submit')->name('survey_submit');

Route::post('/phq2', 'DiagnoseController@diagnose')->name('phq2_get');
Route::post('/phq2-submit', 'DiagnoseController@phq2')->name('phq2_submit');

Route::get('/phq9', 'DiagnoseController@phq9Questions')->name('phq9_get');
Route::post('/phq9-submit', 'DiagnoseController@phq9')->name('phq9_submit');


Route::get('/test', 'SurveyController@test');

/*Route::get('/', function () {
    return view('welcome');
});*/
