@extends('Master.layout')
@extends('Admin.admin-dashboard')

<title>Elèves</title>

@section('vue')
{{ __('Elèves') }}
@endsection

@section('content2')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('success') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<br>

<div class="container mt-3">
   <h2>Elèves</h2>
	  <table class="table">
		<br>
		<tr>
		
        
        
		<a type="button" class="btn btn-primary btn-lg" href="{{ route('parent.add')}}"><i class="fa-solid fa-user-plus"></i>&nbsp; Ajouter un élève</a></tr>
		

		

		<br>
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>CNE</th>
				
				<th>
				<div class="text-center">Rapport mensuel de Présence</div>	
				</th>

				

				<th>
				<div class="text-center">
					Action
				</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($eleves as $eleve)
			<tr>
				
                <td>{{$eleve->Nom}}</td>
				<td>{{$eleve->Prenom}}</td>
				<td>{{$eleve->CNE}}</td>
				
				<td> 
				<div class="text-center">
					<a type="button" data-bs-toggle="modal" data-bs-target="#m_mois_{{$eleve->ID_Eleve}}" class="btn btn-success"> Choisir Mois</a>
				</div>
				</td>

				<div id="m_mois_{{$eleve->ID_Eleve}}" class="modal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<br>
								<h5 class="modal-title">Afficher Rapport Mensuel de Présence</h5>
								<button class="btn-close" data-bs-dismiss="modal"></button>
							</div>
							<div class="modal-body">
								<form role="form" method="get" action="{{route('PDF', $eleve->ID_Eleve)}}">
									@csrf
									<div class="form-group">
										<br>
										<label class="control-label">&nbsp; Choisir Mois</label>
										<div>
											<br>
											<input type="month" name="mois" class="form-control input-lg">
										</div>
									</div>

									<div class="form-group">
										<div>
											<br><br>
											<div class="text-center">
												<button type="submit" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i>Générer le PDF</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

								
				<td>
					<div class="text-center">

					<a type="button" href="{{ route('eleve.edit', $eleve->ID_Eleve)}}" class="btn btn-primary"><i class="fa-solid fa-pen"></i>  Elève</a>
					<a type="button" href="{{ route('parent.edit', $eleve->ID_Parent)}}"class="btn btn-primary"><i class="fa-solid fa-pen"></i>  Parent</a>
					<a type="button" href="{{ route('eleve.afficher', $eleve->ID_Eleve)}}" class="btn btn-success"> &nbsp;<i class="fa-sharp fa-regular fa-eye"></i>&nbsp; </a>

					<button onclick="event.preventDefault(); 
						if(confirm('Êtes-vous sûr?'))
						document.getElementById('{{ $eleve->ID_Eleve }}').submit();"
						type="submit" class="btn btn-danger">&nbsp;<i class="fa-solid fa-trash"></i>&nbsp;</button>

					<form id="{{ $eleve->ID_Eleve }}" action="{{ route('eleve.delete', $eleve->ID_Eleve) }}" method="get">
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

<!-- Pagination -->
<div class="d-flex justify-content-center">
	{{$eleves->links()}}
</div>
@endsection
