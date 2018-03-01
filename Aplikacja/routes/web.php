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


Route::middleware(['auth'])->group(function () {

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/deparments/grid', 'DeparmentsController@grid');
Route::resource('/deparments', 'DeparmentsController');
Route::get('/directions/grid', 'DirectionsController@grid');
Route::resource('/directions', 'DirectionsController');
Route::get('/groups/grid', 'GroupsController@grid');
Route::resource('/groups', 'GroupsController');
Route::get('/items/grid', 'ItemsController@grid');
Route::resource('/items', 'ItemsController');
Route::get('/lessons/grid', 'LessonsController@grid');
Route::resource('/lessons', 'LessonsController');
Route::get('/migrations/grid', 'MigrationsController@grid');
Route::resource('/migrations', 'MigrationsController');
Route::get('/password_resets/grid', 'Password_resetsController@grid');
Route::resource('/password_resets', 'Password_resetsController');
Route::get('/semesters/grid', 'SemestersController@grid');
Route::resource('/semesters', 'SemestersController');
Route::get('/students/grid', 'StudentsController@grid');
Route::resource('/students', 'StudentsController');
Route::get('/times/grid', 'TimesController@grid');
Route::resource('/times', 'TimesController');
Route::get('/users/grid', 'UsersController@grid');
Route::get('/logouting', 'UsersController@logouting')->name('logouting');
Route::resource('/users', 'UsersController');
Route::get('/czasies/grid', 'CzasiesController@grid');
Route::resource('/czasies', 'CzasiesController');
Route::get('/grupies/grid', 'GrupiesController@grid');
Route::resource('/grupies', 'GrupiesController');
Route::get('/kierunkis/grid', 'KierunkisController@grid');
Route::resource('/kierunkis', 'KierunkisController');
Route::get('/lekcjes/grid', 'LekcjesController@grid');
Route::resource('/lekcjes', 'LekcjesController');
Route::patch('/lekcjes/{l}/update', 'LekcjesController@updejt')->name('LU');
Route::get('/przedmioties/grid', 'PrzedmiotiesController@grid');
Route::resource('/przedmioties', 'PrzedmiotiesController');
Route::get('/semestries/grid', 'SemestriesController@grid');
Route::resource('/semestries', 'SemestriesController');
Route::get('/studencis/grid', 'StudencisController@grid');
Route::post('/studencis/{id}/zapisz', 'StudencisController@zapisz')->name('zapisz');
Route::resource('/studencis', 'StudencisController');
Route::get('/wydzialies/grid', 'WydzialiesController@grid');
Route::resource('/wydzialies', 'WydzialiesController');

});