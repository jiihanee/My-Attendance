<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use Illuminate\Support\Facades\Auth;
use App\Models\enseignant;
use App\Models\eleve;
use App\Models\parent_;
use App\Models\classe;
use App\Models\matiere;
use App\Models\seance;
class HomeController extends Controller
{
    public function index(){
        $role=Auth::user()->role  ; 
        if ($role=='0'){
            $nb_enseignants= enseignant::count();
            $nb_eleves= eleve::count();
            $nb_classes= classe::count();
            $nb_matieres= matiere::count();
            return view('admin.admin',['nb_enseignants' => $nb_enseignants , 'nb_eleves' => $nb_eleves ,'nb_matieres' => $nb_matieres ,'nb_classes' => $nb_classes]) ;
        }
        if ($role=='1'){
            $id =  Auth::user()->id_role ;
            $eleve = eleve::where(['ID_Eleve' => $id])->first();
            $classe = classe::where(['ID_Classe' => $eleve->ID_Classe])->first();
            return view('Eleve.eleve', ['eleve' => $eleve], ['classe' => $classe] );
        }
        if ($role=='2'){
            $id =  Auth::user()->id_role ;
            $parent = parent_::where(['ID_Parent' => $id])->first();
            $enfant = eleve::where(['ID_Parent' => $id])->first();
            return view('Parent.parent', ['parent' => $parent , 'enfant'=>$enfant] );
        }
        if ($role=='3'){
            $id =  Auth::user()->id_role ;
            $matieres = Matiere::where('ID_Enseignant', $id)->get() ;
            $nb_matieres = $matieres->count();
            $nb_classes = Classe::whereIn('ID_Classe', $matieres->pluck('ID_Classe'))->count();
            $nb_seances = Seance::whereIn('ID_Matiere', $matieres->pluck('ID_Matiere'))->count();
            
            $ens = enseignant::where(['ID_Enseignant' => $id])->first();
            return view('Enseignant.enseignant', ['ens' => $ens , 'nb_matieres'=>$nb_matieres ,'nb_classes'=>$nb_classes , 'nb_seances'=>$nb_seances  ] );
        
        }
        
         
    }
}
