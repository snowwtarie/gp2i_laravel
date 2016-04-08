<?php
use App\Salles;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/stock', function() {
    $stock = Salles::where('name', 'Stock')->first();
    return redirect(route('salles.show', $stock->id));
});
Route::resource('salles', 'SallesController');
Route::resource('materiels', 'MaterielsController');
Route::resource('caracteristiques', 'CaracteristiquesController');
Route::resource('type', 'TypeMaterielsController');
