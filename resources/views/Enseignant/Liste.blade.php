@extends('Master.layout')
@extends('Enseignant.Ens-dashboard')



@section('vue')
{{ __('Présence') }}
@endsection
@section('content2')


<div class="container mt-3">
    <h2>Liste des élèves</h2>
    <form method="POST" action="{{ route('presence.save', [$seance->ID_Seance, $matiere->ID_Matiere] )}}">
    @csrf  
    

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Présent</th>
                </tr>
            </thead>
            <tbody>

  
    @foreach ($eleves as $eleve)
    <input type="hidden" name="eleves[]" value="{{ $eleve->ID_Eleve }}">
        <tr>

            <td>{{ $eleve->Nom }}</td>
            <td>{{ $eleve->Prenom }}</td>
            <td>
                 <input type="hidden" name="ID_Seance" value="{{ $seance->ID_Seance }}" />
                 <input type="hidden" name="ID_Eleve" value="{{ $eleve->ID_Eleve }}" />
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="presence[{{ $eleve->ID_Eleve }}]" value="true" id="radio_present_{{ $eleve->ID_Eleve }}">
                    <label class="form-check-label" for="radio_present_{{ $eleve->ID_Eleve }}">
                        Présent
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="presence[{{ $eleve->ID_Eleve }}]" value="false" id="radio_absent_{{ $eleve->ID_Eleve }}">
                    <label class="form-check-label" for="radio_absent_{{ $eleve->ID_Eleve }}">
                        Absent
                    </label>
                </div>
                
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
        <button type="submit" class="btn btn-primary">Enregistrer</button> 
    </form><br><br><br>
</div>
@endsection