@extends('Master.layout')
@extends('Eleve.Eleve-dashboard')

<title>Mes informations</title>

@section('vue')
Espace élève
@endsection
@section('content2')
<br><br> 
<div class="container"> 
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4 text-center">
            <img src="{{asset('./uploads/'.$eleve->Photo)}}" alt="Photo de l'élève" class="rounded-circle mx-auto d-block" style="width: 250px; height: 250px;">
        </div>
    </div>

   
    <div >
        <div class="text-center">
            <h2>Bonjour {{ $eleve->Prenom }} {{ $eleve->Nom }}</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID Elève</th>
                        <td>{{ $eleve->ID_Eleve }}</td>
                    </tr>
                    
                        <th>CNE</th>
                        <td>{{ $eleve->CNE }}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{ $eleve->Nom}}</td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td>{{ $eleve->Prenom }}</td>
                    </tr>
                    <tr>
                        <th>Date de naissance</th>
                        <td>{{ $eleve->Date_De_Naissance }}</td>
                    </tr>

                    <tr>
                        <th>Classe</th>
                        <td>{{ $classe->libele }}</td>
                    </tr>
                    
                </tbody>
            </table>
            <h6> En cas de changement de coordonnées veuillez informer l'administrateur de l'établissement.</h6><br><br>
        </div></div>
@endsection
