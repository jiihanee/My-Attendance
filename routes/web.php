<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnsController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\AffElController;
use App\Http\Controllers\AffPaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirects', [HomeController::class, "index"])->name('home');

//Route::redirect(uri:'/login' ,destination:'login')->name('login');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('Gestion/classes')->group(function () {
    Route::get('/', [ClasseController::class, 'index'])->name('classes');
    Route::post("/add", [ClasseController::class, "save"])->name('classe.save');
    Route::get("/edit/{id}", [ClasseController::class, "edit"])->name('classe.edit');
    Route::post("/update/{id}", [ClasseController::class, "update"])->name('classe.update');
    Route::get("/delete/{id}", [ClasseController::class, "delete"])->name('classe.delete');
    Route::get("/afficher/{id}", [ClasseController::class, "afficher"])->name('classe.afficher');   
    
});

Route::prefix('Gestion/élèves')->group(function () {
    Route::get('/', [EleveController::class, 'index'])->name('élèves');
    Route::get('/parent/add', [EleveController::class, 'add_parent'])->name('parent.add');
    Route::post('/parent/save', [EleveController::class, 'save_parent'])->name('parent.save');
    Route::get('/add', [EleveController::class, 'add_eleve'])->name('eleve.add');
    Route::post('/save/infos', [EleveController::class, 'save_eleve'])->name('eleve.save'); 
    Route::get("/edit/{id}", [EleveController::class, "edit_eleve"])->name('eleve.edit');
    Route::get("/edit/parent/{id}", [EleveController::class, "edit_parent"])->name('parent.edit');
    Route::post("/parent/update/{id}", [EleveController::class, "update_parent"])->name('parent.update');
    Route::post("/update/{id}", [EleveController::class, "update_eleve"])->name('eleve.update');
    Route::get("/delete/{id}", [EleveController::class, "delete"])->name('eleve.delete');
    Route::get("/details/{id}", [EleveController::class, "afficher_eleve"])->name('eleve.afficher');
    Route::get("/PDF/{id}",[EleveController::class, "infos_PDF"])->name('PDF');
});

Route::prefix('Gestion/enseignants')->group(function(){
    Route::get('/', [EnsController::class, 'index'])->name('ens');
    Route::get('/add', [EnsController::class, 'add_ens'])->name('ens.add');
    Route::post('/save', [EnsController::class, 'save_ens'])->name('ens.save');
    Route::get('/edit/{id}', [EnsController::class, 'edit_ens'])->name('ens.edit');
    Route::post('/update/{id}', [EnsController::class, 'update_ens'])->name('ens.update');
    Route::get('/details/{id}', [EnsController::class, 'afficher_ens'])->name('ens.afficher');
    Route::get('/delete/{id}', [EnsController::class, 'delete'])->name('ens.delete');
});

Route::prefix('Gestion/matieres')->group(function(){
    Route::get('/', [MatiereController::class, 'index'])->name('matieres');
    Route::post("/add", [MatiereController::class, "save"])->name('matiere.save');
    Route::get("/edit/{id}", [MatiereController::class, "edit"])->name('matiere.edit');
    Route::post("/update/{id}", [MatiereController::class, "update"])->name('matiere.update');
    Route::get("/delete/{id}", [MatiereController::class, "delete"])->name('matiere.delete');
    Route::get("/seances/{id}",[MatiereController::class, "seances"])->name('seances');
    Route::post("/add/seance", [MatiereController::class, "save_seance"])->name('seance.save');
    Route::get("/edit/seance/{id}", [MatiereController::class, "edit_seance"])->name('seance.edit');
    Route::post("/update/seance/{id}", [MatiereController::class, "update_seance"])->name('seance.update');
    Route::get("/delete/seance/{id}", [MatiereController::class, "delete_seance"])->name('seance.delete');



 
});

Route::prefix('Gestion/presence')->group(function(){
 
    Route::get('/mesClasses',[PresenceController::class,'mesClasses'])->name('mesclasses');
    Route::get('/mesSeances/{id}',[PresenceController::class,'mesSeances'])->name('messeances');
    Route::get('/GererPresence/{id}',[PresenceController::class,'liste'])->name('liste');
    Route::post('/GererPresence/AjouterPresence/{id1}/{id2}',[PresenceController::class,'savepresence'])->name('presence.save');
    Route::get('/GererPresence/PresenceMensuelle/{id}',[PresenceController::class,'presence_mois'])->name('presence.mensuelle');
    Route::get('/mesInfos',[PresenceController::class,'mesInfos'])->name('mesInfos');
   
});

Route::prefix('Eleve')->group(function(){
    Route::get('/Infos',[AffElController::class,'mesInfos'])->name('InfosEleve');
    Route::get('/Presence',[AffElController::class,'maPresence'])->name('maPresence') ;
    Route::get('/afficher/Presence',[AffElController::class,'AffPresence'])->name('pres');
});


Route::prefix('Parent')->group(function(){
    Route::get('/Enfant/Infos',[AffPaController::class,'mesInfosP'])->name('InfosP');
    Route::get('/Enfant/PresenceP',[AffPaController::class,'maPresenceP'])->name('PresenceEnfant') ;
    Route::get('/Enfant/afficher/PresenceP',[AffPaController::class,'AffPresenceP'])->name('presEnfant');
});