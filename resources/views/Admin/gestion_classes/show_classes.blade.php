@extends('Master.layout')
@extends('Admin.admin-dashboard')

<title>Classes</title>

@section('vue')
{{ __('Classes') }}
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
						<h5 class="modal-title">Ajouter une nouvelle classe</h5>
						<button class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<div class="modal-body">
						<form role="form" method="POST" action="{{route('classe.save')}}">
							@csrf
							
							<div class="form-group">
								<br>
								<label class="control-label">&nbsp; Libellé de classse</label>
								<div>
									<br>
									<input type="text" class="form-control input-lg" name="libele" placeholder="Libellé de classse">
								</div>
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
   <h2>Classes</h2>
	  <table class="table"> <br>
		<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#m_create"><i class="fa-solid fa-plus"></i> &nbsp; Ajouter une classe</button><br>
		   <thead>
			    <tr>
				<th>Libellé</th>
				<th>
					<div class="text-center">Action</div>
					
				</th>
			   </tr>
		   </thead>
		   <tbody>
		    @foreach($classes as $classe)
			<tr>
				<td>{{$classe->libele}}</td>
				
				
				<td>
				<div class="text-center">
					<a  href="{{ route('classe.edit', $classe->ID_Classe) }}" class="btn btn-primary">&nbsp;<i class="fa-solid fa-pen"></i> &nbsp; </a>
					
					<a type="button" class="btn btn-success" href="{{ route('classe.afficher', $classe->ID_Classe) }}">&nbsp; <i class="fa-sharp fa-regular fa-eye"></i> &nbsp;</a>

					<button onclick="event.preventDefault(); 
                     if(confirm('Êtes-vous sûr?'))
                    document.getElementById('{{ $classe->ID_Classe }}').submit();"
                     type="submit" class="btn btn-danger">&nbsp;<i class="fa-solid fa-trash"></i>&nbsp;</button>


					<form id="{{ $classe->ID_Classe }}" action="{{ route ('classe.delete', $classe->ID_Classe) }}" method="get">
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
    {{$classes->links()}}
</div>
<!--Fin Pagination-->
@endsection