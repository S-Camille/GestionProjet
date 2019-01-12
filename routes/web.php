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
    // test pour voir si on réussi à interroger le programme à la route /
    /*return User::create([
        'firstname' => 'Jane',
        'telephone' => '00000000',
        'email' => 'john@jane.com',
        'password' => bcrypt('password'),
    ]);*/
    return redirect('/home');
});
Route::resources([
    "User" => "UserController",
    "Entreprise" => "EntrepriseController",
    "Attestation" => "AttestationController",
    "SoumissionAO" => "SoumissionAOController",
    "AppelOffre" => "AOController",
    "ExerciceComptable" => "ExComptableController"
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/type_selection', 'type_selection');

Route::get('/register_structure','registerStructureController@index')->name('register_structure');

Route::post('/register_structure','registerStructureController@create')->name('register_structureCreation');