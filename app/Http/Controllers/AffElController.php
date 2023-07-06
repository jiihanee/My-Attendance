<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\classe;
use App\Models\matiere;
use App\Models\seance;
use App\Models\eleve;
use App\Models\presence;


class AffElController extends Controller
{
    public function mesInfos() {
        $id =  Auth::user()->id_role ;
        $eleve = eleve::where(['ID_Eleve' => $id])->first();
        $classe = classe::where(['ID_Classe' => $eleve->ID_Classe])->first();
        return view('Eleve.eleve', ['eleve' => $eleve], ['classe' => $classe] );
    }

    public function maPresence(){
        return view('Eleve.maPresence');
    }

    public function AffPresence(Request $request)
    {

        if ($request->date_pres) {
            $date = date('Y-m-d', strtotime($request->date_pres));
            $presences = presence::where([
                'ID_Eleve' => Auth::user()->id_role
            ])->whereDate('created_at', '=', $date)->get();
            $seances = seance::whereIn('ID_Seance', $presences->pluck('ID_Seance'))->get();
            $matieres = matiere::whereIn('ID_Matiere',$seances->pluck('ID_Matiere'))->get();
            return view('Eleve.show_pres_date', ['presences' => $presences , 'matieres' => $matieres ,'seances' => $seances ,'date'=>$date] );
        
        }
         
         
        else if ($request->mois_pres) {

            $month_year = date('m/Y', strtotime($request->mois_pres));

            $presences = presence::where([
                 'ID_Eleve'=>Auth::user()->id_role
            ])->whereMonth('created_at', '=', $month_year)->get();
            $seances = seance::whereIn('ID_Seance', $presences->pluck('ID_Seance'))->get();
            $matieres = matiere::whereIn('ID_Matiere',$seances->pluck('ID_Matiere'))->get();
            return view( 'Eleve.show_pres_mois', ['presences' => $presences , 'matieres' => $matieres ,'seances' => $seances , 'month_year'=>$month_year]  )  ;

          }
          
          
     
    }
    
    





 }

