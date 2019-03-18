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
    return view('auth.login');
});
   
    Route::get('login-vote-details', 'VoteDetailsController@index')->name('login.vode.details'); 
    Route::get('create-vote-details', 'VoteDetailsController@create')->name('create.vote.details'); 
    Route::get('search-ac', 'VoteDetailsController@searchAc')->name('search.ac'); 
    Route::get('search-table', 'VoteDetailsController@searchTable')->name('search.table'); 
    Route::get('vote.details.boothno.show/{pc_code}/{ac_code}/{table_no}', 'VoteDetailsController@boothNoShow')->name('vote.details.boothno.show'); 
    Route::post('store-vote-details/{id}', 'VoteDetailsController@store')->name('store.vote.details'); 
    Route::get('candidate-vote-details/{id}', 'VoteDetailsController@candidateDetails')->name('candidate.vote.details'); 
    Route::get('candidate-result', 'VoteDetailsController@candidateDetailsRoundFinsh')->name('candidate.vote.details.result'); 
    Route::get('logout', 'Auth\LoginController@logout');
      
    // Route::get('/', 'HomeController@index')->name('home'); 
   
 
Auth::routes(); 

 
 Route::group(['prefix' => 'dashboard','middleware' => 'auth'], function() {
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
       Route::get('show', 'PCDetailsController@show')->name('pc.details.show');
       Route::get('edit/{id}', 'PCDetailsController@edit')->name('pc.details.edit');
       Route::get('delete/{id}', 'PCDetailsController@destroy')->name('pc.details.delete');
       Route::post('update/{id}', 'PCDetailsController@update')->name('pc.details.update');
  });
  Route::group(['prefix' => 'ac-details'], function() {
       Route::get('/', 'ACDetailsController@index')->name('ac.details');
       Route::post('store', 'ACDetailsController@store')->name('ac.store');
       Route::get('show', 'ACDetailsController@show')->name('ac.details.show');
       Route::get('edit/{id}', 'ACDetailsController@edit')->name('ac.details.edit');
       Route::get('delete/{id}', 'ACDetailsController@destroy')->name('ac.details.delete');
       Route::post('update/{id}', 'ACDetailsController@update')->name('ac.details.update');

  });
  Route::group(['prefix' => 'booth-details'], function() {
       Route::get('/', 'BoothDetailsController@index')->name('booth.details');
       Route::post('store', 'BoothDetailsController@store')->name('booth.store');
       Route::post('store-excel', 'BoothDetailsController@storeByExcel')->name('booth.store.excel');
       Route::get('show', 'BoothDetailsController@show')->name('booth.details.show');
       Route::get('edit/{id}', 'BoothDetailsController@edit')->name('booth.details.edit');
       Route::get('delete/{id}', 'BoothDetailsController@destroy')->name('booth.details.delete');
       Route::post('update/{id}', 'BoothDetailsController@update')->name('booth.details.update');
  });
  Route::group(['prefix' => 'conting-table'], function() {

       Route::get('/', 'CountingTableController@index')->name('conting.table');
       Route::post('store', 'CountingTableController@store')->name('conting.store');
       Route::get('show', 'CountingTableController@show')->name('conting.table.show');
       Route::get('edit/{id}', 'CountingTableController@edit')->name('conting.table.edit');
       Route::get('delete/{id}', 'CountingTableController@destroy')->name('conting.table.delete');
       Route::post('update/{id}', 'CountingTableController@update')->name('conting.table.update');
  });
  Route::group(['prefix' => 'conting-table-booth-map'], function() {

        Route::get('/', 'CountingTableBoothMapController@index')->name('conting.table.booth.map');   
        Route::get('store', 'CountingTableBoothMapController@store')->name('conting.table.booth.map.store');   
        Route::get('show', 'CountingTableBoothMapController@show')->name('conting.table.booth.map.show');   
  });
  
 });
 