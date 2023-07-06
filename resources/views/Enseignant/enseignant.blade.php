@extends('Master.layout')
@extends('Enseignant.Ens-dashboard') 

<title>Espace Enseignant</title>

@section('vue')
Espace Enseignant
@endsection
 
@section('content2')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h2>Bonjour {{ $ens->Nom }} {{ $ens->Prenom }}</h2>
                </div>
                <div class="card-body">
                    <br>
                    <p><i class="fas fa-id-card"></i> <b>CIN :</b> {{ $ens->CIN }}</p>
                    <p><i class="fas fa-phone"></i> <b>Numéro de téléphone :</b> {{ $ens->Num_Telephone }}</p>
                  <br>
                </div>
<div class="d-flex flex-wrap justify-content-center ">
    <div class="col-sm-3 mb-2 ">
        <div class="card text-white bg-success" style="max-width: 10rem;">
            <div class="card-body">
                <div class="text-center">
                <h3>{{$nb_seances}}</h3> <h5 class="card-title"><i class="fa-solid fa-clock"></i>&nbsp; Séances </h5><br>  
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-sm-3 mb-2 ">
        <div class="card text-white bg-success" style="max-width: 10rem; ">
            <div class="card-body">
                <div class="text-center">
                <h3>{{$nb_classes}}</h3> <h5 class="card-title"><i class="fa-solid fa-users"></i>&nbsp; Classes</h5><br>
                   
                   
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3 mb-2 ">
        <div class="card text-white bg-success" style="max-width: 10rem; ">
            <div class="card-body">
                <div class="text-center">
                  <h3>{{$nb_matieres}}</h3> <h5 class="card-title"><i class="fa-solid fa-book"></i> &nbsp; Matières</h5><br>
                    
                    
                </div>
            </div>
        </div>
    </div>




                
            </div>
        </div>
    </div>
</div>

<br><br>

@endsection