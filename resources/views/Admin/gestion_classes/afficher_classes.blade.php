@extends('Master.layout')
@extends('Admin.admin-dashboard')


@section('vue')
{{ __('Elèves de classe') }} 
@endsection

@section('content2')
@if(session()->has('success')) 

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('success') }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
<br><br>
<div class="row">
    @foreach ($eleves as $eleve)
        <div class="col-md-3 mb-2">
            <div class="card post-card">
            <div class="card-header">
                   <h5> {{ $eleve->Nom }} {{ $eleve->Prenom }}</h5> 
                </div>
                <img class="card-img-top" src="{{ asset('./uploads/'.$eleve->Photo)}}" >
                <div class="card-body">
                <table class="table">
                <tbody>
                    <tr>
                        <th>ID Elève</th>
                        <td>{{ $eleve->ID_Eleve }}</td>
                    </tr>
                    <tr>
                        <th>CNE</th>
                        <td>{{ $eleve->CNE }}</td>
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
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center">
    {{$eleves->links()}}
</div>
@endsection