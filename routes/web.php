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
   
    Route::post('admin-login-vote-details', 'VoteDetailsController@adminLoginVoteDetails')->name('admin.login.vote.details'); 
    Route::get('admin-logout-vote-details', 'VoteDetailsController@adminLogoutVoteDetails')->name('admin.logout.vote.details'); 
    Route::post('session-set', 'VoteDetailsController@sessionSet')->name('user.session.set'); 
    Route::get('login-vote-details', 'VoteDetailsController@index')->name('login.vote.details'); 
    Route::get('create-vote-details', 'VoteDetailsController@create')->name('create.vote.details'); 
    Route::get('search-ac', 'VoteDetailsController@searchAc')->name('search.ac'); 
     
    Route::get('search-table', 'VoteDetailsController@searchTable')->name('search.table'); 
    Route::get('vote-details-boothno-show/{pc_code}/{ac_code}/{table_no}', 'VoteDetailsController@boothNoShow')->name('vote.details.boothno.show'); 
    Route::post('store-vote-details/{id}', 'VoteDetailsController@store')->name('store.vote.details'); 
    Route::get('candidate-vote-details/{id}', 'VoteDetailsController@candidateDetails')->name('candidate.vote.details'); 
    Route::get('candidate-result', 'VoteDetailsController@candidateDetailsRoundFinsh')->name('candidate.vote.details.result'); 
    Route::get('logout', 'Auth\LoginController@logout');
      
    // Route::get('/', 'HomeController@index')->name('home'); 
   
 
Auth::routes(); 

 
 Route::group(['prefix' => 'dashboard','middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('download/{pc_code}/{ac_code}/{round_no}/{table_no}', 'HomeController@download')->name('report.download');
  Route::get('round-wise-download/{ac_code}/{pc_code}/{round_no}', 'HomeController@roundReportDownload')->name('round.report.download');
  Route::get('booth-wise-download/{ac_code}/{pc_code}/{booth_no}', 'HomeController@boothReportDownload')->name('booth.report.download');
  Route::get('vote-details-roudWiseDetails/{pc_code}/{ac_code}/{booth_no}', 'HomeController@roudWiseDetails')->name('vote.details.roud.wise.details');
  Route::get('aro-candidate-vote-details/{id}', 'HomeController@candidateDetails')->name('aro.candidate.vote.details'); 
  Route::get('vote-detail/result', 'HomeController@adminVoteDetailsResult')->name('admin.votedetail.result');

  Route::group(['prefix' => 'user'], function() {
      Route::get('/', 'UserController@index')->name('user.list');
      Route::post('store', 'UserController@store')->name('user.store');
      Route::get('delete/{user}', 'UserController@destroy')->name('user.delete');
      Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
      Route::get('show', 'UserController@showTable')->name('user.show');
      Route::post('update/{user}', 'UserController@update')->name('user.update');
  });
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
       Route::get('search-ac2', 'ACDetailsController@searchAc2')->name('search.ac2');

  });
  Route::group(['prefix' => 'booth-details'], function() {
       Route::get('/', 'BoothDetailsController@index')->name('booth.details');
       Route::post('store', 'BoothDetailsController@store')->name('booth.store');
       Route::post('store-excel', 'BoothDetailsController@storeByExcel')->name('booth.store.excel');
       Route::get('show', 'BoothDetailsController@show')->name('booth.details.show');
       Route::post('show-filter', 'BoothDetailsController@showFilter')->name('booth.show');
       Route::get('edit/{id}', 'BoothDetailsController@edit')->name('booth.details.edit');
       Route::get('delete/{id}', 'BoothDetailsController@destroy')->name('booth.details.delete');
       Route::post('update/{id}', 'BoothDetailsController@update')->name('booth.details.update');
       Route::get('total-vote-form', 'BoothDetailsController@totalVoteForm')->name('total.vote.form');
       Route::post('total-vote-update', 'BoothDetailsController@totalVoteUpdate')->name('total.vote.update');
       Route::get('total-vote-table', 'BoothDetailsController@totalVotetable')->name('total.vote.table');
       Route::get('search', 'BoothDetailsController@search')->name('booth.details.search');
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
  Route::group(['prefix' => 'vote'], function() {
       
        Route::get('aro-vote-form', 'VoteDetailsController@VoteForm')->name('aro.vote.form');
        Route::get('aro-vote-candidate-show/{pc_code}/{ac_code}', 'VoteDetailsController@VoteCandidateFormShow')->name('aro.vote.candidate.show');
  });
  
 });
 