@extends('Master.layout')
@extends('Admin.admin-dashboard')

<title>Enseignants</title>

@section('vue')
{{ __('Enseignants') }}
@endsection

@section('content2')

<!-- message de succes -->
@if(session()->has('success')) 
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('success') }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif <br>

<div class="container mt-3">
   <h2>Enseignants</h2>
	  <table class="table"> <br>
		<a type="button" class="btn btn-primary btn-lg" href="{{ route('ens.add')}}"> <i class="fa-solid fa-user-plus"></i>&nbsp; Ajouter un enseignant </a><br>
		   <thead>
			    <tr>
				<th>Nom</th>
				<th>Prénom</th>
                <th>
				<div class="text-center">Action</div>
				</th>
			   </tr>
		   </thead>
		   <tbody>
		    @foreach($enseignants as $ens)
			<tr>
				<td>{{$ens->Nom}}</td>
				<td>{{$ens->Prenom}}</td>
				
                

				<td>
				    <div class="text-center">
					<a type="button" href="{{ route('ens.edit', $ens->ID_Enseignant)}}"class="btn btn-primary">&nbsp; <i class="fa-solid fa-pen"></i> &nbsp; </a>
					<a type="button" href="{{ route('ens.afficher', $ens->ID_Enseignant)}}" class="btn btn-success">&nbsp; <i class="fa-sharp fa-regular fa-eye"></i> &nbsp; </a>
                    
					<button onclick="event.preventDefault(); 
                     if(confirm('Êtes-vous sûr?'))
                    document.getElementById('{{ $ens->ID_Enseignant }}').submit();"
                     type="submit" class="btn btn-danger">&nbsp;<i class="fa-solid fa-trash"></i>&nbsp;</button>


					<form id="{{ $ens->ID_Enseignant }}" action="{{ route ('ens.delete', $ens->ID_Enseignant) }}" method="get">
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
    {{$enseignants->links()}}
</div>
@endsection