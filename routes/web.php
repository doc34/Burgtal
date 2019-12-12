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
Route::get('api/materiallist', 'MateriallistController@index')->name('api.materiallist');
Route::get('/api/materialblock', 'UnTafelController@index')->name('api.materialblock');
Route::get('/stark', 'StarckController@index')->name('stark');
Route::get('/art', 'ArtController@index')->name('art');
Route::get('/api/anrede', 'AnredeController@index')->name('api.anrede');
Route::post('/api/create/kunde', 'KundenController@store')->name('api.create.kunde');
Route::get('api/show/format', function () {
    return  App\Format::all();
});




// Pagination abfrage
Route::get('api/show/material', function () {
    return  App\Material::orderBy('material', 'asc')->paginate( 15 );
});

Route::get('api/searchQuery/material', function () {
    return  App\Material::orderBy('material', 'asc')->paginate( 15 );
});



// suchen anfrage post
Route::post('/api/searchQuery/kunde', 'KundenController@searchQuery')->name('api.searchQuery.kunde');
Route::post('/api/searchQuery/lieferant', 'LieferantController@searchQuery')->name('api.searchQuery.kunde');
Route::post('/api/searchQuery/material', 'MaterialController@searchQuery')->name('api.searchQuery.material');
Route::post('/api/searchQuery/kontakte', 'KontakteController@searchQuery')->name('api.searchQuery.kontakte');

// aufgabenliste post  queryshow
Route::post('/api/create/aufgabeliste', 'AufgabenlisteController@store')->name('api.create.aufgabenliste');
Route::post('/api/show/queryshow', 'AufgabenlisteController@queryshow')->name('api.show.queryshow');
// Aufgabennummer
Route::post('/api/create/aufgabenummer', 'AufgabenummerController@store')->name('api.create.aufgabenummer');
Route::post('/api/info/aufgabenummer', 'AufgabenummerController@infoindex')->name('api.info.aufgabenummer');


// Projekte

Route::post('/api/store/projekt', 'ProjektController@store')->name('api.store.projekt');
Route::get('/api/show/projekt', 'ProjektController@show')->name('api.show.projekt');
Route::post('/api/edit/projekt', 'ProjektController@edit')->name('api.edit.projekt');
Route::post('/api/update/projekt', 'ProjektController@update')->name('api.update.projekt');

//Kontakte Projekt
Route::post('/api/store/kontakte', 'KontakteController@store')->name('api.store.kontakte');
Route::post('/api/show/kontakte', 'KontakteController@showprojekt')->name('api.show.kontakte');
Route::post('/api/store/kontaktelist', 'KontakteController@StoreKontakteliste')->name('api.store.kontakteliste');

// Unmaßtafel
Route::post('/api/store/unmasstafel', 'UnTafelController@store')->name('api.store.unmasstafel');

//updateimg
// Admin Panel
Route::post('/api/edit/material', 'MaterialController@edit')->name('api.edit.material');
Route::post('/api/show/material', 'MaterialController@show')->name('api.show.material');
Route::post('/api/img/material/{id}', 'MaterialController@updateimg')->name('api.img.material.id');
Route::post('/api/updata/material', 'MaterialController@update')->name('api.updata.material');
Route::post('/api/del/material', 'MaterialController@destroy')->name('api.del.material');
Route::post('/api/store/material', 'MaterialController@store')->name('api.store.material');
Route::get('/api/lieferant', 'LieferantController@index')->name('api.lieferant');
Route::post('/api/store/prisliste', 'PreisliesteController@store')->name('api.store.prisliste');
Route::post('/api/serach/prisliste', 'PreisliesteController@serach')->name('api.store.prisliste');
Route::post('/api/del/prisliste', 'PreisliesteController@destroy')->name('api.del.prisliste');
