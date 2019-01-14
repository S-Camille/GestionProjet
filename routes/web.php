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

Route::get('/register_ex_comptable','registerExComptableController@index')->name('register_ex_comptable');
Route::post('/creation_ex_comptable','registerExComptableController@create')->name('creation_ex_comptable');

Route::get('/profil/{id}','profilController@index')->name('profil');

Route::get('/list_appel_offre','listAppelOffreController@index')->name('list_appel_offre');

Route::view('/register_appel_offre','createAppelOffre')->name('register_appel_offre');
Route::post('/creation_appel_offre','registerAppelOffreController@create')->name('creation_appel_offre');

Route::get('/detail/{id_appel_offre}','profilController@getIdAppelOffre')->name('get_detail_appel_offre');