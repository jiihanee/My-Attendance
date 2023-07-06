<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EnsRequest;
use App\Models\enseignant;
use App\Models\User ;


class EnsController extends Controller
{
    public function index(){
        $enseignants = enseignant::latest()->paginate(6);
        return  view('Admin.gestion_ens.show_ens',['enseignants'=>$enseignants]);
     }
    
     public function add_ens(){
         return view('Admin.gestion_ens.add_ens') ;
     }

     public function save_ens(EnsRequest $request){
        $ens = enseignant::create([
            'CIN' => $request->CIN,
            'Nom' => $request->Nom,
            'Prenom' => $request->Prenom,
            'Num_Telephone' => $request->Num_Telephone
        ]);
        $user = new user() ;
        $user->name = $ens->Nom ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password) ;
        $user->role='3';
        $user->id_role=$ens->ID_Enseignant ;    
        $user->save() ;

         
        return redirect()->route('ens')->with([
            'success'=>'Enseignant ajoué!' 
          ]);
       
     }

     public function edit_ens($id){
        $ens = enseignant::where('ID_Enseignant', $id)->first();
        return view('Admin.gestion_ens.edit_ens',['ens'=>$ens ]); 
     }

     public function update_ens(EnsRequest $request,$id){
        $ens = enseignant::where('ID_Enseignant', $id)->first();
       
        $ens->update([
        'CIN' => $request->CIN,
        'Nom' => $request->Nom,
        'Prenom' => $request->Prenom,
        'Num_Telephone' => $request->Num_Telephone
        ]);

        return redirect()->route('ens')->with([
            'success'=>'informations d enseignant modifiées  !' 
          ]);
     }
     public function afficher_ens($id){
        $ens = enseignant::where('ID_Enseignant',$id)->first();
        return  view('admin.gestion_ens.afficher_ens', ['ens' => $ens ]);
     }


     public function delete($id){
        $ens=enseignant::where('ID_Enseignant',$id) ;
        $user=user::where('role',3)->where('id_role',$id);
        $user->delete();
        $ens->delete();

        return redirect()->route('ens')->with([
         'success'=>'enseignant suprimmé !' 
       ]);
     }

}
