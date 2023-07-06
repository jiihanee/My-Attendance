@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier infos du parent @endsection

@section('vue')
{{ __('Modifier infos du parent ') }}
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
                <div class="card-header">Infos Parent</div>
                <div class="card-body">
                      <form role="form" method="POST" action="{{ route('parent.update',$parent->ID_Parent) }}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Nom</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Nom" value="{{$parent->Nom}}" >
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Prenom</label>
								<div>
									<br> 
									<input type="text" class="form-control input-lg" name="Prenom" value="{{$parent->Prenom}}">
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; CIN</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="CIN" value="{{$parent->CIN}}" >
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Numero de Telephone</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="NUM_Telephone" value="{{$parent->Num_Telephone}}">
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