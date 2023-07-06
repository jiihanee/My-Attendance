<?php

namespace App\Http\Controllers;
use App\Models\classe ;
use App\Models\eleve ;
use App\Http\Requests\ClasseRequests;

use Illuminate\Http\Request;

class ClasseController extends Controller
{ 
    public function index(){
       $classes = classe::latest()->paginate(6);
       
        return  view('Admin.gestion_classes.show_classes',['classes'=>$classes]);
    }

    public function save(ClasseRequests $request){
       classe::create([
        'libele' => $request->libele 
       ]); 
       return redirect()->route('classes')->with([
        'success'=>'classe ajoutée !' 
      ]);
       
    }
  
    public function edit ($id){
      $classe = classe::where('ID_Classe', $id)->first();
      return view('Admin.gestion_classes.edit_classes',['classe'=>$classe]); 
    }

    public function update(ClasseRequests $request ,$id){
      $classe = classe::where('ID_Classe',$id)->first();
          $classe->update([
             'libele'=>$request->libele
          ]);
          return redirect()->route('classes')->with([
            'success'=>'libelle modifie !' 
          ]);
    }
    public function afficher($id){
       $eleves = eleve::where('ID_Classe',$id)->paginate(6);;
       return view('Admin.gestion_classes.afficher_classes',['eleves'=>$eleves]) ;
    }

    public function delete($id){

      $classe= classe::where('ID_Classe',$id)->first() ;
      $classe->delete();
       return redirect()->route('classes')->with([
        'success'=>'classe suprimmee !' 
      ]);


}
}