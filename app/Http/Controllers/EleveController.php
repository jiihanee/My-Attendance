<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\classe;
use App\Http\Requests\ParentRequest;
use App\Http\Requests\EleveRequest;
use Illuminate\Http\Request;
use App\Models\eleve;
use App\Models\parent_;
use App\Models\User ;
use App\Models\presence ;
use App\Models\seance ;
use App\Models\matiere ;
use Barryvdh\DomPDF\Facade\PDF;

class EleveController extends Controller
{ 
    public function index()
    {
        $eleves = eleve::latest()->paginate(5);
        return  view('admin.gestion_eleves.show_eleves', ['eleves' => $eleves]);
    }


    public function add_parent()
    {
        return view('admin.gestion_eleves.add_parent');
    }

    public function save_parent(ParentRequest $request)
    {
        $parent = parent_::create([
            'CIN' => $request->CIN,
            'Nom' => $request->Nom,
            'Prenom' => $request->Prenom,
            'NUM_Telephone' => $request->NUM_Telephone
        ]);
        $user = new user() ;
        $user->name = $parent->Nom ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password) ;
        $user->role='2';
        $user->id_role=$parent->ID_Parent ;    
        $user->save() ;

        $classes = classe::all();
        return  view('admin.gestion_eleves.add_eleve', ['parent' => $parent, 'classes' => $classes]);
    }

     
    public function save_eleve(EleveRequest $request)
    {
        if ($request->has('photo')) {
            $file = $request->photo;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
        }

       $eleve=eleve::create([
            'ID_Parent' => $request->ID_Parent,
            'ID_Classe'  => $request->ID_Classe,
            'CNE'  => $request->CNE,
            'Nom'  => $request->Nom,
            'Prenom'  => $request->Prenom,
            'Date_De_Naissance' => $request->Date_De_Naissance ,
            'photo' => $image_name

        ]);

        $user = new user() ;
        $user->name = $eleve->Nom ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password) ;
        $user->role='1';
        $user->id_role=$eleve->ID_Eleve;
        $user->save() ;
        
        return redirect()->route('élèves')->with([
            'success'=>' élève ajouté ' 
          ]);
       
        
    }

    public function edit_parent ($id){
        $parent = parent_::where('ID_Parent', $id)->first();
        return view('Admin.gestion_eleves.modifier_parent',['parent'=>$parent ]); 
      }

     public function update_parent(ParentRequest $request ,$id){
        $parent = parent_::where('ID_Parent', $id)->first();
       
            $parent->update([
            'CIN' => $request->CIN,
            'Nom' => $request->Nom,
            'Prenom' => $request->Prenom,
            'Num_Telephone' => $request->Num_Telephone
            ]);
 
            return redirect()->route('élèves')->with([
                'success'=>'informations Parent modifiées  !' 
              ]);
 }


      public function edit_eleve ($id){
        $eleve = eleve::where('ID_Eleve', $id)->first();
        $classes = classe::all();
        return view('Admin.gestion_eleves.modifier_eleve',['eleve'=>$eleve , 'classes' => $classes]); 
      }
       
      public function update_eleve(EleveRequest $request ,$id){
        $eleve = eleve::where('ID_Eleve', $id)->first();

         if ($request->has('photo')){
            $file = $request->photo ;
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name) ;
            unlink(public_path('uploads').'/'.$eleve->Photo) ;
            $eleve->photo = $image_name ;
          }
       
            $eleve->update([
                'ID_Parent' => $request->ID_Parent,
                'ID_Classe'  => $request->ID_Classe,
                'CNE'  => $request->CNE,
                'Nom'  => $request->Nom,
                'Prenom'  => $request->Prenom,
                'Date_De_Naissance' => $request->Date_De_Naissance ,
                'Photo' => $eleve->Photo 
            ]);
              
           
            return redirect()->route('élèves')->with([
                'success'=>'informations élève modifiees  !' 
            ]);
      }

      public function afficher_eleve($id){
        $eleve= eleve::where('ID_Eleve',$id)->first() ;
        $classe= classe::where('ID_Classe',$eleve->ID_Classe)->first();
        $parent = parent_::where('ID_Parent',$eleve->ID_Parent)->first();
        return  view('admin.gestion_eleves.afficher_eleve', ['eleve' => $eleve , 'parent'=>$parent ,'classe'=>$classe]);
      }



      public function delete($id){

        $eleve= eleve::where('ID_Eleve',$id)->first() ;
        $parent=parent_::where('ID_Parent',$eleve->ID_Parent) ;
        $user_parent=user::where('role',2)->where('id_role',$eleve->ID_Parent);
        $user_eleve=user::where('role',1)->where('id_role',$eleve->ID_Eleve);
        $user_parent->delete() ;
        $user_eleve->delete();
        $parent->delete() ;
        unlink(public_path('uploads').'/'.$eleve->Photo) ;
        $eleve->delete();

         return redirect()->route('élèves')->with([
          'success'=>'élève suprimmé !' 
        ]);
      }

      public function infos_PDF($id ,Request $request){
        $eleve = eleve::where('ID_Eleve',$id)->first() ;

        $month_year = date('m/Y', strtotime($request->mois));

        $presences = presence::where([
             'ID_Eleve'=>$id
        ])->whereMonth('created_at', '=', $month_year)->get();

        $seances = seance::whereIn('ID_Seance', $presences->pluck('ID_Seance'))->get();
        $matieres = matiere::whereIn('ID_Matiere',$seances->pluck('ID_Matiere'))->get();
       

        $pdf = PDF::loadView('Admin.test', array('eleve' => $eleve , 'seances'=>$seances , 'presences'=>$presences  , 'matieres'=>$matieres , 'month_year'=>$month_year));

        return $pdf->download($eleve->Nom .'_'. $eleve->Prenom .'_'.$month_year.'_'.'.pdf');
       
      }

 

   

    
}
