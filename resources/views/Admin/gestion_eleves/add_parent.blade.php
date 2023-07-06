@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Ajouter infos du parent @endsection

@section('vue')
{{ __('Ajouter infos du parent ') }}
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
                <div class="card-header">Donées du Parent</div>
                <div class="card-body">
                      <form role="form" method="POST" action="{{ route('parent.save') }}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Nom</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Nom" >
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Prénom</label>
								<div>
									<br> 
									<input type="text" class="form-control input-lg" name="Prenom" >
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; CIN</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="CIN" >
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Numéro de Téléphone</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="NUM_Telephone" >
								</div>
							</div>
							 
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; E-mail</label>
								<div>
									<br> 
									<input type="email" class="form-control input-lg" name="email" placeholder="entrer un email nom_prenom@MyAttendance.ma" >
								</div>
						     	</div>
								<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Mot de Passe</label>
								<div>
									<br>
									<input type="password" class="form-control input-lg" name="password" >
								</div>
							</div>
                            
							<div class="form-group">
								<div>
									<br><br>
									<div class="text-center">
										<button type="submit" class="btn btn-success">Suivant</button>
									</div>
									
								</div>
							</div>
						</form>
                </div></div></div></div></div><br><br>
@endsection