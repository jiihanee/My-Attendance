@extends('Master.layout')
@extends('Parent.parent-dashboard')


@section('vue')
Espace Parent
@endsection

@section('content2')
<br>

<div class="container mt-3">
<h4>   Rapport de présence du : {{ $date }}</h4> <br>
    <table class="table table-striped">
    
        <thead>
            
            <tr>
                <th>Seance</th>
                <th>Créneau horaire</th>
                <th>Matiere</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presences as $presence)
                @php
                    $seance = $seances->firstWhere('ID_Seance', $presence->ID_Seance);
                    $matiere = $matieres->firstWhere('ID_Matiere', $seance->ID_Matiere);
                @endphp
                <tr>
                    <td>{{ $seance->Type }}</td>
                    <td>{{ $seance->Heure }}</td>
                    <td>{{ $matiere->Nom }}</td>
                    @if($presence->etat == 1)
                        <td>présent</td>
                    @else 
                        <td>absent</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
