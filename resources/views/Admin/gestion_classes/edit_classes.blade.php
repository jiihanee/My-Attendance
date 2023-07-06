@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier Classe @endsection

@section('vue')
{{ __('Modifier Classe') }}
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
                <div class="card-header">Modifier</div>
                <div class="card-body">
                      <form role="form" method="POST" action="{{ route('classe.update',$classe->ID_Classe) }}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Libellé de classse</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="libele" value="{{$classe->libele}}">
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