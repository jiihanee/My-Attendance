
@extends('Master.layout')

@extends('Admin.admin-dashboard')



<title>Espace Administrateur</title>


@section('vue')
Espace Administrateur
@endsection
 
@section('content2')
<br><br>

<div class="d-flex flex-wrap justify-content-center ">
    <div class="col-sm-3 mb-2 ">
        <div class="card text-white bg-success" style="max-width: 18rem; margin-left: 10px;">
            <div class="card-body">
                <div class="text-center">
                <h3>{{$nb_enseignants}}</h3> <h5 class="card-title"><i class="fa-solid fa-person-chalkboard"></i>&nbsp; Enseignants</h5><br>
                    <p class="card-text">Ajouter et donner l'accès à la plateforme aux enseignants, supprimer, modifier les données</p><br>
                    <a type="button" href="{{route('ens')}}" class="btn btn-outline-light">Aller à &nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3 mb-2">
        <div class="card text-white bg-success" style="max-width: 18rem; margin-left: 10px;">
            <div class="card-body">
                <div class="text-center">
                  <h3>{{$nb_eleves}}</h3>  <h5 class="card-title"><i class="fa-sharp fa-solid fa-graduation-cap"></i>&nbsp; Élèves</h5><br>
                    <p class="card-text">Ajouter et donner l'accès à la plateforme aux élèves et parents, supprimer, modifier les données</p><br>
                    <a type="button" href="{{route('élèves')}}" class="btn btn-outline-light">Aller à &nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
    </div>
 
    <div class="col-sm-3 mb-2">
        <div class="card text-white bg-success" style="max-width: 18rem; margin-left: 10px;">
            <div class="card-body">
                <div class="text-center">
                   <h3>{{$nb_classes}}</h3> 
                   <h5 class="card-title">
                    <i class="fa-solid fa-users"></i> &nbsp;
                    
                    Classes</h5><br>
                    <p class="card-text">Ajouter et modifier des classes</p><br><br><br>
                    <a type="button" href="{{route('classes')}}" class="btn btn-outline-light">Aller à &nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3 mb-2">
        <div class="card text-white bg-success" style="max-width: 18rem; margin-left: 10px;">
            <div class="card-body">
                <div class="text-center">
                   <h3>{{$nb_matieres}}</h3> <h5 class="card-title"><i class="fa-solid fa-book"></i> &nbsp; Matières</h5><br>
                    <p class="card-text">Créer des matières, modifier des séances et générer le PDF du rapport mensuel d'absence.</p><br>
                    <a type="button" href="{{route('matieres')}}" class="btn btn-outline-light">Aller à &nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
    </div>


</div>
<br><br>
@endsection



