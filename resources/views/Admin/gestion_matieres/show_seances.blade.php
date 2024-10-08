@extends('Master.layout')
@extends('Admin.admin-dashboard')

<title>Séances</title>

@section('vue')
{{ __('Séances de la matiere ')  }}
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
						<h5 class="modal-title">Ajouter une  Séance </h5>
						<button class="btn-close" data-bs-dismiss="modal"></button>
					</div> 

					<div class="modal-body">
						<form role="form" method="POST"   action="{{ route ('seance.save') }}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Type de Séance</label><br><br>
								   <select name="Type" class="form-control input-lg">
                                         <option value="Cours">Cours</option>
                                         <option value="TD">TD</option>
										 <option value="TP">TP</option>
                                   </select>
							 </div>

                            <div class="form-group">

								<br>
								<label class="control-label">&nbsp; Jour </label><br><br>
								   <select name="Jour" class="form-control input-lg">
                                         <option value="1">Lundi</option>
                                         <option value="2"> Mardi</option>
										 <option value="3"> Mercredi</option>
										 <option value="4"> Jeudi</option>
										 <option value="5"> Vendredi</option>

                                   </select>
							 </div><br>

                            <div class="form-group">
                            <label class="control-label" class="form-control input-lg">&nbsp; Heure Séance</label><br>
                            <input type="time"  name="Heure" min="08:00" max="18:00" class="form-control input-lg" required><br>
							<div class="text-center"><small>Heures de travail de 8 heures matin à 6 heures soir</small></div>
							
                            </div>

                            <div class="form-group">
                            <input type="text" name='ID_Matiere' value="{{ $matiere->ID_Matiere}}" hidden>
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
   <h2><i class="fa-regular fa-clock"></i> &nbsp; Séances</h2>
	  <table class="table"> <br>
		<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#m_create"><i class="fa-solid fa-plus"></i> &nbsp;Ajouter une séance</button><br>
		   <thead>
			    <tr>
				
				<th>Jour</th>
				<th>Heure</th>
				<th>Type</th>
				<th>
					<div class="text-center">Action</div>
				
			
			</th>
			   </tr> 
		   </thead>
		   <tbody>
          
		   @foreach($seances as $seance)
	         <tr>
		        
			    
				@if ($seance->Jour==1) 
				<td>Lundi</td>
				@elseif ($seance->Jour==2)
                <td>Mardi</td>
				@elseif ($seance->Jour==3)
                <td>Mercredi</td>
				@elseif ($seance->Jour==4)
                <td>Jeudi</td>
				@else ($seance->Jour==5)
                <td>Vendredi</td>
				@endif

				<td>{{$seance->Heure}}</td>
				<td>{{$seance->Type}}</td>

	    
	              <td>
					<div class="text-center">

					
				  
                     <a  href="{{ route('seance.edit', $seance->ID_Seance) }}" class="btn btn-primary"> <i class="fa-solid fa-pen"></i></a>
					<button onclick="event.preventDefault(); 
                     if(confirm('Êtes-vous sûr?'))
                    document.getElementById('{{ $seance->ID_Seance }}').submit();"
                     type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>


					<form id="{{ $seance->ID_Seance}}" action="{{ route ('seance.delete', $seance->ID_Seance) }}" method="get">
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
@endsection