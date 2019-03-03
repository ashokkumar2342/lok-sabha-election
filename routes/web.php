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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

 
 Route::group(['prefix' => 'dashboard'], function() {
  Route::get('/', 'HomeController@index')->name('home');

  Route::group(['prefix' => 'condidate-details'], function() {
      Route::get('/', 'CandidateDetailsController@index')->name('candidate.details');
      Route::post('store', 'CandidateDetailsController@store')->name('condidate.store');
      Route::get('delete/{id}', 'CandidateDetailsController@destroy')->name('candidate.delete');
      Route::get('edit/{id}', 'CandidateDetailsController@edit')->name('candidate.edit');
      Route::get('show', 'CandidateDetailsController@showTable')->name('candidate.show');
      Route::post('update/{id}', 'CandidateDetailsController@update')->name('candidate.update');
  });
  Route::group(['prefix' => 'pc-details'], function() {
       Route::get('/', 'PCDetailsController@index')->name('pc.details');
       Route::post('store', 'PCDetailsController@store')->name('pc.store');
  });
  Route::group(['prefix' => 'ac-details'], function() {
       Route::get('/', 'ACDetailsController@index')->name('ac.details');
       Route::post('store', 'ACDetailsController@store')->name('ac.store');
  });
  Route::group(['prefix' => 'booth-details'], function() {
       Route::get('/', 'BoothDetailsController@index')->name('booth.details');
       Route::post('store', 'BoothDetailsController@store')->name('booth.store');
  });
  
 });
 