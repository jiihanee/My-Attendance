<?php

namespace App\Http\Controllers;



use App\Http\Requests\MatiereRequest;
use App\Http\Requests\SeanceRequest;
use App\Models\matiere;
use App\Models\enseignant;
use App\Models\seance;
use App\Models\classe;
use Illuminate\Http\Request;
use App\Models\eleve;
use App\Models\presence;


class MatiereController extends Controller
{
    public function index()
    {
        $matieres = matiere::latest()->paginate(6);
        $enseignants= enseignant::all() ;
        $classes=classe::all() ;
        return  view('Admin.gestion_matieres.show_matieres', ['matieres' => $matieres , 'enseignants'=>$enseignants, 'classes'=>$classes]);
    }

    public function save(MatiereRequest $request)
    {
        matiere::create([
            'Nom' => $request->Nom ,
            'ID_Enseignant'=>$request->ID_Enseignant ,
            'ID_Classe'=>$request->ID_Classe
        ]);
        return redirect()->route('matieres')->with([
            'success' => 'matière ajoutée !'
        ]);
    }

    public function edit ($id){
        $matiere = matiere::where('ID_Matiere', $id)->first();
        $enseignants= enseignant::all() ;
        $classes=classe::all() ;
        return view('Admin.gestion_matieres.modifier_matiere',['matiere'=>$matiere , 'enseignants'=>$enseignants , 'classes'=>$classes]); 
      }
  
      public function update(MatiereRequest $request ,$id){
        $matiere = matiere::where('ID_Matiere',$id)->first();
            $matiere->update([
               'Nom'=>$request->Nom,
               'ID_Enseignant'=>$request->ID_Enseignant,
               'ID_Classe'=>$request->ID_Classe
            ]);
            return redirect()->route('matieres')->with([
              'success'=>'matière modifiée !' 
            ]);
      } 

      public function seances($id){
        $matiere = Matiere::where(['ID_Matiere' => $id])->first() ;
        $seances = Seance::where(['ID_Matiere' => $id])->get() ;
        $eleves = eleve::where(['ID_Classe'=>$matiere->ID_Classe])->get();
        
        return view ('Admin.gestion_matieres.show_seances',['seances'=>$seances , 'matiere'=>$matiere , 'eleves'=>$eleves] ) ;
      }

      public function save_seance(SeanceRequest $request){
       $seance=seance::create([
          'ID_Matiere'=>$request->ID_Matiere,
          'Jour' => $request->Jour ,
          'Heure'=>$request->Heure ,
          'Type' =>$request->Type 
          
      ]);
    
      return redirect()->route('seances',$seance->ID_Matiere)->with([
          'success' => 'séance ajoutée !'
      ]);

      }

      public function edit_seance ($id){
        $seance = seance::where('ID_Seance', $id)->first();
        $matiere = matiere::where('ID_Matiere',$seance->ID_Matiere)->first();
        return view('Admin.gestion_matieres.modifier_seances',['seance'=>$seance ], ['matiere'=>$matiere]); 
      }

      public function update_seance(SeanceRequest $request , $id){
        $seance = seance::where('ID_Seance',$id)->first();
            $seance->update([
               'Heure'=>$request->Heure,
               'Jour' => $request->Jour ,
               'Type'=>$request->Type,
            ]);
            return redirect()->route('seances',$seance->ID_Matiere)->with([
              'success'=>'Séance modifiée !' 
            ]);

      }

      public function delete_seance($id){
        $seance=seance::where('ID_Seance',$id)->first();
        $seance->delete();
        return redirect()->route('seances',$seance->ID_Matiere)->with([
          'success'=>'séance suprimmée !' 
        ]);
        
      }

      
      public function delete($id){

        $matiere= matiere::where('ID_Matiere',$id)->first() ;
        $matiere->delete();
         return redirect()->route('matieres')->with([
          'success'=>'matière suprimmee !' 
        ]);
}



}