@extends('Master.layout')
@extends('Parent.parent-dashboard')


@section('vue')
Espace Parent
@endsection

@section('content2')
<br><br> 
<div class="container"> 
    

   
    <div >
        <div class="text-center">
            <h2>Bonjour {{ $parent->Prenom }} {{ $parent->Nom }}</h2>
            <table class="table">
                <tbody>
                    
                    
                        <th>CIN</th>
                        <td>{{ $parent->CIN }}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{ $parent->Nom}}</td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td>{{ $parent->Prenom }}</td>
                    </tr>
                    <tr>
                        <th>Num de Téléphone</th>
                        <td>{{ $parent->Num_Telephone }}</td>
                    </tr>

                    <tr>
                        <th>Parent de :</th>
                        <td>{{ $enfant->Nom }} {{$enfant->Prenom }}</td>
                    </tr>
                    
                </tbody>
            </table>
            <h6> En cas de changement de coordonnées veuillez informer l'administrateur de l'établissement  !!</h6><br><br>
            </div>
            </div>
@endsection