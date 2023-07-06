@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier Matière @endsection

@section('vue')
{{ __('Modifier Matière') }}
@endsection

@section('content2')
<br><br>
<div class="container">
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
                      <form role="form" method="POST" action="{{ route('matiere.update', $matiere->ID_Matiere) }}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Libellé de matière </label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Nom" value="{{$matiere->Nom}}"><br>
								</div>
							</div>
                            <div class="form-group">
                              <label class="control-label">&nbsp; Enseignant</label><br><br>
                                 <select name="ID_Enseignant" class="form-control">
                                   @foreach($enseignants as $enseignant) 
                                   <option value="{{ $enseignant->ID_Enseignant }}" @if($matiere->ID_Enseignant == $enseignant->ID_Enseignant) selected @endif>
                                     {{ $enseignant->Nom }} {{ $enseignant->Prenom }} 
                                  </option>
                                @endforeach
                             </select>
                           </div><br>

                           <div class="form-group">
                              <label class="control-label">&nbsp; Classe</label><br><br>
                                 <select name="ID_Classe" class="form-control">
                                   @foreach($classes as $classe) 
                                   <option value="{{ $classe->ID_Classe }}" @if($matiere->ID_Classe == $classe->ID_Classe) selected @endif>
                                     {{ $classe->libele }} 
                                  </option>
                                @endforeach
                             </select>
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