@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier infos du parent @endsection

@section('vue')
{{ __('Afficher Enseignant ') }}
@endsection

@section('content2')
<br><br>
<div class="container-">
    <div class="row justify-content-center">
        <div class="col-md-5">
<div class="card" > 
                <div class="card-header">Donées Enseignant</div>
                <div class="card-body">
                      <form role="form" >
							
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Nom</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Nom" value="{{$ens->Nom}}" disabled>
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Prénom</label>
								<div>
									<br> 
									<input type="text" class="form-control input-lg" name="Prenom" value="{{$ens->Prenom}}" disabled>
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; CIN</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="CIN" value="{{$ens->CIN}}" disabled>
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Numéro de Téléphone</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Num_Telephone" value="{{$ens->Num_Telephone}}" disabled>
								</div>
							</div>
							 
							
                            
							
						</form>
                </div></div></div></div></div><br><br>
@endsection