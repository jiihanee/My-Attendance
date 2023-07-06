@extends('Master.layout')
@extends('Admin.admin-dashboard')

<title>Matières</title>

@section('vue')
{{ __('Matières') }}
@endsection

@section('content2')
<!-- message de succes -->
@if(session()->has('success')) 
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('success') }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif <br>
<!--Fin message de succes -->

<!--Modal create-->
<div id="m_create" class="modal">
			<div class="modal-dialog">
				<div class="modal-content">
                        <div class="modal-header">
						<br>  
						<h5 class="modal-title">Ajouter une nouvelle Matière</h5>
						<button class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<div class="modal-body">
						<form role="form" method="POST" action="{{route('matiere.save')}}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Libellé de Matière</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="Nom" placeholder="Libellé de classse"><br>
								</div>
							</div>
                            <div class="form-group">
                                <label class="control-label">&nbsp;Enseignant</label><br><br>
                                          <select name="ID_Enseignant"   class="form-control" >
                                    @foreach($enseignants as $ens) 
                                          <option value="{{ $ens->ID_Enseignant }}">{{ $ens->Nom }} {{ $ens->Prenom }}</option>
                                    @endforeach
                            </select>  
                       </div> <br> 
                        
					   <div class="form-group">
                        <label class="control-label">&nbsp; Classe</label><br><br>
                           <select name="ID_Classe"  class="form-control" >
                                    @foreach($classes as $classe) 
                                          <option value="{{ $classe->ID_Classe }}">{{ $classe->libele }}</option>
                                    @endforeach
                            </select>  
                       </div> 

							<div class="form-group">
								<div>
									<br><br>
									<div class="text-center">
										<button type="submit" class="btn btn-success">Ajouter</button>
									</div>
									
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
<!-- Fin de Modal create-->

<!--container de bckground blanc-->
<div class="container mt-3">
   <h2>Matières</h2>
	  <table class="table"> <br>
		<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#m_create"><i class="fa-solid fa-plus"></i> &nbsp; Ajouter une matière</button><br>
		   <thead>
			    <tr>
				<th>Libellé</th>
				<th>Enseignant</th>
				<th>Classe</th>
				<th>
                  <div class="text-center">Séances</div>
				</th>
				<th>
				<div class="text-center">Action</div>
				</th>
			   </tr>
		   </thead>
		   <tbody>
		   @foreach($matieres as $matiere)
	          <tr>
		      <td>{{$matiere->Nom}}</td>

		        <td>
		         @foreach($enseignants as $ens)
			     @if ($ens->ID_Enseignant == $matiere->ID_Enseignant)
				  {{$ens->Nom}} {{$ens->Prenom}}
			    @endif
	        	@endforeach</td> 
				

				<td>
		         @foreach($classes as $classe)
			     @if ($classe->ID_Classe == $matiere->ID_Classe)
				  {{$classe->libele}}
			     @endif
	        	 @endforeach
				</td>
				
				
				<td>
				<div class="text-center"><a href="{{ route('seances', $matiere->ID_Matiere) }}" class="btn btn-success"> Séances accordées </div></a></td>
				
				<td>
				<div class="text-center"> <a href="{{ route('matiere.edit', $matiere->ID_Matiere) }}" class="btn btn-primary"> &nbsp; <i class="fa-solid fa-pen"></i> &nbsp;</a>
               
          
				

					<button onclick="event.preventDefault(); 
                     if(confirm('Êtes-vous sûr?'))
                    document.getElementById('{{ $matiere->ID_Matiere }}').submit();"
                     type="submit" class="btn btn-danger">&nbsp;<i class="fa-solid fa-trash"></i>&nbsp;</button>


					<form id="{{ $matiere->ID_Matiere }}" action="{{ route ('matiere.delete', $matiere->ID_Matiere) }}" method="get">
                     @csrf        
                   </form>

                

				   </div>
				</td>
				 
			</tr>
		@endforeach
			<br> 
			
		</tbody>
		
	</table>
</div>
<!--Pagination-->
<div class="d-flex justify-content-center">
    {{$matieres->links()}}
</div>
<!--Fin Pagination-->
@endsection