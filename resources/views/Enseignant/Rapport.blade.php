@extends('Master.layout')
@extends('Enseignant.Ens-dashboard')

<title>Rapport de présence</title>

@section('vue')
{{ __('Rapport Mensuel') }}
@endsection
@section('content2')

<div class="container mt-3">
    <h2><td>Elève {{ $eleve->Nom }} {{ $eleve->Prenom }}</td></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presences as $presence)
                
                    
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($presence->created_at)) }}</td>
                            
                            @if($presence->etat == 1 )
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