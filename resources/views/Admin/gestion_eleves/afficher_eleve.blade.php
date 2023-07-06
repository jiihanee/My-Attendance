@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier infos du parent @endsection

@section('vue')
{{ __("Données de l'élève") }}
@endsection

@section('content2')
<br><br> 
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4 text-center">
            <img src="{{asset('./uploads/'.$eleve->Photo)}}" alt="Photo de l'élève" class="rounded-circle mx-auto d-block" style="width: 250px; height: 250px;">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>{{ $eleve->Prenom }} {{ $eleve->Nom }}</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID Elève</th>
                        <td>{{ $eleve->ID_Eleve }}</td>
                    </tr>
                    <tr>
                        <th>Classe</th>
                        <td>{{ $classe->libele }}</td>
                    </tr>
                    <tr>
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
                        <th>Créé le</th>
                        <td>{{ $eleve->created_at->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Dernière mise à jour</th>
                        <td>{{ $eleve->updated_at->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2>Parent</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID Parent</th>
                        <td>{{ $parent->ID_Parent }}</td>
                    </tr>
                    <tr>
                        <th>CIN</th>
                        <td>{{ $parent->CIN }}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{ $parent->Nom }}</td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td>{{ $parent->Prenom }}</td>
                    </tr>
                    <tr>
                        <th>Numéro de téléphone</th>
                        <td>{{ $parent->Num_Telephone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>
@endsection