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
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => ['auth','checkRole:admin']],function(){


Route::get('/siswa','SiswaController@index');
Route::post('/siswa/create', 'SiswaController@create');
Route::get('/siswa/{id}/edit', 'SiswaController@edit');
Route::post('/siswa/{id}/update', 'SiswaController@update');
Route::get('/siswa/{id}/delete','SiswaController@delete');

Route::get('/guru','GuruController@index');
Route::post('/guru/create', 'GuruController@create');
Route::get('/guru/{id}/edit', 'GuruController@edit');
Route::post('/guru/{id}/update', 'GuruController@update');
Route::get('/guru/{id}/delete','GuruController@delete');

Route::get('/akunguru','AkunGuruController@index');
// Route::post('/akunguru/create', 'AkunGuruController@create');
Route::get('/akunguru/{id}/delete','AkunGuruController@delete');

Route::get('/akunsiswa','AkunSiswaController@index');
// Route::post('/akunsiswa/create', 'AkunSiswaController@create');
Route::get('/akunsiswa/{id}/delete','AkunSiswaController@delete');

Route::get('/siswa/{id}/profile', 'SiswaController@profile');
Route::get('/guru/{id}/profile', 'GuruController@profile');

Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');


Route::get('/matpel', 'MapelController@addmatpel');
Route::post('/matpel/create', 'MapelController@create');
Route::get('/matpel/{id}/delete', 'MapelController@delete');

Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');


Route::post('/guru/{id}/addmapel', 'GuruController@addmapel');
Route::get('/guru/{id}/{idmapel}/deletemapel','GuruController@deletemapel');

Route::get('/siswa/exportexcel', 'SiswaController@exportExcel');
Route::get('/siswa/exportpdf', 'SiswaController@exportPdf');

Route::get('/guru/exportexcel', 'GuruController@exportExcel');
Route::get('/guru/exportpdf', 'GuruController@exportPdf');
});

Route::group(['middleware' => ['auth','checkRole:admin,siswa,guru']],function(){
Route::get('/dashboard','DashboardController@index');

});

