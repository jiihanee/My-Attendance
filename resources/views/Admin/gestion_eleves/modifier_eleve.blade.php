@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier Infos d'élève @endsection

@section('vue')
{{ __(' Modifier les données d élève') }}
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
                <div class="card-header">les données d'élève</div>
                <div class="card-body">
                      <form role="form" method="POST" action="{{ route('eleve.update',$eleve->ID_Eleve) }}" enctype="multipart/form-data" >
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Nom</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Nom" value="{{$eleve->Nom}}">
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Prénom</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Prenom" value="{{$eleve->Prenom}}">
								</div>
							</div>
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; CNE</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="CNE" value="{{$eleve->CNE}}">
								</div>
							</div>

                            <div class="form-group">
                            <br>
                            <label  class="col-md-4 col-form-label text-md-right">Image</label><br>
                            
                            <input  class="form-control" type="file" name="photo" id="photo"><br>
                            </div>

                        <div class="form-group">
                        <label class="control-label">&nbsp; Classe</label><br><br>
                        <select name="ID_Classe" class="form-control">
    @foreach($classes as $classe) 
        <option value="{{ $classe->ID_Classe }}" @if($classe->ID_Classe == $eleve->ID_Classe) selected @endif>
            {{ $classe->libele }}
        </option>
    @endforeach
</select>

                       </div>  
                            <div class="form-group">
								<br>
								<label class="control-label">&nbsp; Date de naissance</label><br>
                                <br>
                                <div>
                                    <input type="date"  class="form-control" name="Date_De_Naissance" value="{{$eleve->Date_De_Naissance}}"></div>
                                 
                              </div>
                                <div class="form-group">
                                <input type="text" name='ID_Parent' value="{{$eleve->ID_Parent}}" hidden/>
                                </div><br>
                       <br><br>
                            
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