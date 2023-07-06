<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresenceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\classe;
use App\Models\matiere;
use App\Models\seance;
use App\Models\eleve;
use App\Models\presence;
use App\Models\enseignant;
class PresenceController extends Controller
{

    public function mesInfos() {
        $id =  Auth::user()->id_role ;
        $ens = enseignant::where(['ID_Enseignant' => $id])->first();
        $matieres = Matiere::where('ID_Enseignant', $id)->get() ;
            $nb_matieres = $matieres->count();
            $nb_classes = Classe::whereIn('ID_Classe', $matieres->pluck('ID_Classe'))->count();
            $nb_seances = Seance::whereIn('ID_Matiere', $matieres->pluck('ID_Matiere'))->count();
        return view('Enseignant.enseignant', ['ens' => $ens ,'nb_matieres'=>$nb_matieres ,'nb_classes'=>$nb_classes,'nb_seances'=>$nb_seances ] );

    
    }
    

    public function mesClasses(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $matieres = matiere::where('ID_Enseignant', Auth::user()->id_role)->get();
        $classes = classe::whereIn('ID_Classe', $matieres->pluck('ID_Classe'))->get();
        return view('Enseignant.Mesclasses', ['classes' => $classes , 'matieres'=>$matieres]);
    }
   

    public function mesSeances($id){
        $matiere = Matiere::where(['ID_Matiere' => $id])->first() ;
        $seances = Seance::where(['ID_Matiere' => $id])->get() ;
        $eleves = eleve::where(['ID_Classe'=>$matiere->ID_Classe])->get();
        return view('Enseignant.Messeances',['seances'=>$seances , 'eleves'=>$eleves]) ;
    }

    public function liste($id){
        $seance = Seance::where(['ID_Seance' => $id])->first() ;
        $matiere = Matiere::where(['ID_Matiere'=>$seance->ID_Matiere])->first() ;
        $classe = classe::where(['ID_Classe'=>$matiere->ID_Classe])->first() ;
        $eleves = eleve::where(['ID_Classe'=>$classe->ID_Classe])->get();
        return view ('Enseignant.Liste',['eleves'=>$eleves , 'seance'=>$seance ,'matiere'=>$matiere]) ;
    }
    public function savepresence(PresenceRequest $request, $id1 ,$id2)
    {   
        $eleveIds = $request->input('eleves');
        foreach ($eleveIds as $eleveID) {
             presence::create([
                'ID_Seance' => $id1,
                'ID_Eleve' => $eleveID,
                'etat' => $request->presence[$eleveID] == 'true' ? true : false,
            ]);
        }
        
        return redirect()->route('messeances',$id2)->with('success', 'La présence a été enregistrée avec succès.');
    }
     
    public function presence_mois($id, Request $request){
        $seance = Seance::where(['ID_Seance' => $id])->first() ;

        $month_year = date('m/Y', strtotime($request->mois));
        $eleve= eleve::where(['ID_Eleve'=>$request->ID_Eleve])->first();
        
        $presences = presence::where([
            'ID_Seance' => $id, 'ID_Eleve'=>$eleve->ID_Eleve
        ])->whereMonth('created_at', '=', $month_year)->get();

        return view ('Enseignant.Rapport', ['presences' => $presences] , ['eleve'=>$eleve] );

 }

 
    




    }

   
    

