@extends('Master.layout')
@extends('Enseignant.Ens-dashboard')

<title>Mes Classes</title>

@section('vue')
{{ __('Classes') }}
@endsection
@section('content2')
<div class="container mt-3">
   <h2>Classes</h2>
   @foreach($classes as $classe)
   <table class="table">
      <thead>
         <tr>
            <th>Matières de la Classe : {{ $classe->libele }}</th>
            <th>
               
              
            </th>
         </tr>
      </thead>
      <tbody>
         @foreach($matieres as $matiere)
         @if($matiere->ID_Classe == $classe->ID_Classe)
         <tr>
            <td>{{ $matiere->Nom }}</td>
            <td>
               <div class="text-center"> <a type="button" class="btn btn-success" href="{{route('messeances',$matiere->ID_Matiere)}}"> &nbsp; Afficher  Séances &nbsp;</a>
</div>
            </td>
         </tr>
         @endif 
         @endforeach
      </tbody>
   </table>
   @endforeach
</div>
@endsection
