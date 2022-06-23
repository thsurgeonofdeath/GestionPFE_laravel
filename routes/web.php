<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SujetController;
use App\Models\Sujet;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');
//Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('contacts', 'ContactController');
    Route::get('/encadrant', 'EncadrantController@index')->name('encadrant');
    Route::get('/etudiant', 'EtudiantController@index')->name('etudiant');
    Route::get('/Admin', 'AdminController@index')->name('Admin');
    Route::get('/Admin/etudiants', 'AdminController@etudiants')->name('Admin.etudiants');
    Route::get('/Admin/etudiants/search', 'AdminController@search')->name('Admin.search');
    Route::get('/Admin/encadrants', 'AdminController@encadrants')->name('Admin.encadrants');
    Route::get('/Admin/admins', 'AdminController@admins')->name('Admin.admins');
    Route::get('/Admin/{user}', 'AdminController@destroy')->name('Admin.destroy');
    Route::get('/Admin/etudiants/create','AdminController@add')->name('Admin.createE');
    Route::post('/Admin/etudiants/storeE','AdminController@storeE')->name('Admin.storeE');
    Route::get('/Admin/etudiants/edit/{id}','AdminController@editE')->name('Admin.editE');
    Route::put('/Admin/etudiants/update/{id}','AdminController@updateE')->name('Admin.updateE');
    Route::get('/Admin/edit/{id}/{role}','AdminController@edit')->name('Admin.edit');
    Route::put('/Admin/update/{id}/{role}','AdminController@update')->name('Admin.update');
    Route::get('/Admin/create/{role}','AdminController@create')->name('Admin.create');
    Route::post('/Admin/store/{role}','AdminController@store')->name('Admin.store');
    Route::get('/Admin/export/admin', 'AdminController@exportA')->name('Admin.exportA');
    Route::get('/Admin/export/encadrant', 'AdminController@exportE')->name('Admin.exportE');
});
//Route::get('/etudiant','LoginController@redirectTo')->middleware(['auth'])->name('etudiant');
//Route::get('/etudiant','LoginController@redirectTo')->name('encadrant')->middleware('encadrant');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//Route::get('/etudiant', function () {return view('etudiant');})->middleware(['auth','verified'])->name('etudiant');
Route::get('/etudiant', 'SujetController@afficherSujet')->middleware(['auth','verified'])->name('etudiant');
Route::get('/encadrant', 'SujetController@afficherSujetE')->middleware(['auth','verified'])->name('encadrant');

/*Route::get('/encadrant', function () {
    return view('encadrant');
})->middleware(['auth','verified'])->name('encadrant');
*/
require __DIR__.'/auth.php';
/////////////////Etudiant///////////////////////////////////
Route::get('etudiant/addsujet', [SujetController::class,'addsujet'])->name('etudiant.addsujet')->middleware('auth');
Route::get("etudiant/mesSujet_valide/{id}", [SujetController::class,'mesSujet_valide'])->name('mes_sujets_valide')->middleware('auth');
Route::get("etudiant/mesSujet_nonvalide/{id}", [SujetController::class,'mesSujet_nonvalide'])->name('mes_sujets_nonvalide')->middleware('auth');
Route::post("/storeSujet", [SujetController::class,'storeSujet'])->middleware('auth')->name('storeSujet');
Route::get("detailSujete/{id}", [SujetController::class,'detailSujet'])->middleware('auth')->name('detailSujet');
Route::post("etudiant/filtre", [SujetController::class,'filtre'])->name('filterEt');
Route::post("etudiant/filtretitre", [SujetController::class,'filtre_titre'])->name('filter_titre');

/////////////////Encadrant///////////////////////////////////
Route::get("/searchE", [SujetController::class,'searchE']);
Route::get("/filtreFiliereE", [SujetController::class,'filtreFiliereE']);
Route::get("/filtreTypeE", [SujetController::class,'filtreTypeE']);
Route::get("/filtreNiveauE", [SujetController::class,'filtreNiveauE']);
Route::get("detailSujeteE/{id}", [SujetController::class,'detailSujetE'])->middleware('auth')->name('detailSujetE');
Route::get("modifierSujeteE/{id}", [SujetController::class,'modifierSujetE'])->middleware('auth')->name('modifier');
Route::post("/ajouterSujet", [SujetController::class,'sujet'])->name('ajouterSujet');

Route::get('findEtudiantWithFiliereID/{id}/{promo}/{niveau}',[SujetController::class,'findEtudiantWithFiliereID'])->name('findEtudiantWithFiliereID');
//Route::get('/GetSubCatAgainstMainCatEdit/{id}', [SujetController::class,'GetSubCatAgainstMainCatEdit']);
Route::post("valider/{id}", [SujetController::class,'valider'])->name('valider');
Route::post("storeModification/{id}", [SujetController::class,'storeModification'])->name('storeModification');
Route::get("supprimerSujet/{id}", [SujetController::class,'supprimerSujet'])->middleware('auth')->name('supprimerSujet');
Route::get("/parametre", [SujetController::class,'parametre'])->middleware('auth')->name('parametre');
Route::get("/parametreE", [SujetController::class,'parametreE'])->middleware('auth')->name('parametreE');
Route::post("/modifierInfo", [SujetController::class,'modifierInfo'])->middleware('auth')->name('modifierInfo');
Route::post("/sendMsg", [SujetController::class,'sendMsg'])->name('sendMsg');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');
Route::get('/generatePV', function () {
    $data= User::query()
    ->where('role','=','encadrant')
    ->get();
    $sujets= Sujet::query()
    ->get();
    return view('generatePV',['data'=>$data, 'sujets'=>$sujets]);
})->name('generatePV');
Route::post("/sendpv", [SujetController::class,'sendpv'])->name('sendpv');
Route::get("/cherche", [SujetController::class,'cherche']);
