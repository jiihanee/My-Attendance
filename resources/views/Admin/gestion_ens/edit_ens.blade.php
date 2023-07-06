@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier infos d enseignant @endsection

@section('vue')
{{ __('Modifier infos d enseignant ') }}
@endsection

@section('content2')
<br><br> 
<div class="container-">
    <div class="row justify-content-center">
        <div class="col-md-5">
          @if ($errors->any())
                  <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                  </ul>
              </div>
         @endif
            <div class="card" > 
                <div class="card-header"> Modifier Donées Enseignant</div>
                <div class="card-body">
                      <form role="form" method="POST" action="{{ route('ens.update',$ens->ID_Enseignant) }}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Nom</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Nom" value="{{$ens->Nom}}" >
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Prénom</label>
								<div>
									<br> 
									<input type="text" class="form-control input-lg" name="Prenom" value="{{$ens->Prenom}}">
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; CIN</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="CIN" value="{{$ens->CIN}}" >
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Numéro de Téléphone</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Num_Telephone" value="{{$ens->Num_Telephone}}">
								</div>
							</div>
							 
							
                            
							<div class="form-group">
								<div>
									<br><br>
									<div class="text-center">
										<button type="submit" class="btn btn-success">Modifier</button>
									</div>
									
								</div>
							</div>
						</form>
                </div></div></div></div></div><br><br>
@endsection