<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\classe;
use App\Models\matiere;
use App\Models\seance;
use App\Models\parent_;
use App\Models\presence;
use App\Models\eleve;

class AffPaController extends Controller

{
    public function mesInfosP() {
        $id =  Auth::user()->id_role ;
        $parent = parent_::where(['ID_Parent' => $id])->first();
        $enfant = eleve::where(['ID_Parent' => $id])->first();
        return view ('Parent.parent', ['parent' => $parent , 'enfant'=>$enfant ]);
    }

    public function maPresenceP(){
        return view('Parent.Presence_enfant');
    }

   

    public function AffPresenceP(Request $request)
    {

        if ($request->date_pres) {
            $date = date('Y-m-d', strtotime($request->date_pres));
            $id =  Auth::user()->id_role ;
            $eleve = eleve::where(['ID_Parent' => $id])->first();
            $presences = presence::where([
                'ID_Eleve' => $eleve->ID_Eleve
            ])->whereDate('created_at', '=', $date)->get();
            $seances = seance::whereIn('ID_Seance', $presences->pluck('ID_Seance'))->get();
            $matieres = matiere::whereIn('ID_Matiere',$seances->pluck('ID_Matiere'))->get();
            return view('Parent.P_show_pres_date', ['presences' => $presences , 'matieres' => $matieres ,'seances' => $seances ,'date'=>$date] );
        
        }
        
         
        else if ($request->mois_pres) {
 
            $month_year = date('m/Y', strtotime($request->mois_pres));
            $id =  Auth::user()->id_role ;
            $eleve = eleve::where(['ID_Parent' => $id])->first();
            $presences = presence::where([
                'ID_Eleve' => $eleve->ID_Eleve
            ])->whereMonth('created_at', '=', $month_year)->get();
            $seances = seance::whereIn('ID_Seance', $presences->pluck('ID_Seance'))->get();
            $matieres = matiere::whereIn('ID_Matiere',$seances->pluck('ID_Matiere'))->get();
            return view( 'Parent.P_show_pre_mois', ['presences' => $presences , 'matieres' => $matieres ,'seances' => $seances , 'month_year'=>$month_year]  )  ;

          }
          
         
     
    }

   
   
    





}
