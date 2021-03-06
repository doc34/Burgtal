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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/Kunden', 'KundenController@index')->name('Kunden');
Route::get('/land', 'LandController@index')->name('Land');
Route::get('/partnertype', 'PartnertypController@index')->name('partnertype');
Route::get('/rechtsform', 'RechtsformController@index')->name('rechtsform');


Route::get('/stark', 'StarckController@index')->name('stark');
Route::get('/art', 'ArtController@index')->name('art');


Route::get('/api/anrede', 'AnredeController@index')->name('api.anrede');
Route::post('/api/create/kunde', 'KundenController@store')->name('api.create.kunde');


// suchen anfrage post
Route::post('/api/searchQuery/kunde', 'KundenController@searchQuery')->name('api.searchQuery.kunde');
Route::post('/api/searchQuery/lieferant', 'LieferantController@searchQuery')->name('api.searchQuery.kunde');
Route::post('/api/searchQuery/material', 'MaterialController@searchQuery')->name('api.searchQuery.material');

// aufgabenliste post  queryshow
Route::post('/api/create/aufgabeliste', 'AufgabenlisteController@store')->name('api.create.aufgabenliste');
Route::post('/api/show/queryshow', 'AufgabenlisteController@queryshow')->name('api.show.queryshow');
// Projekte

Route::post('/api/store/projekt', 'ProjektController@store')->name('api.store.projekt');
Route::get('/api/show/projekt', 'ProjektController@show')->name('api.show.projekt');
