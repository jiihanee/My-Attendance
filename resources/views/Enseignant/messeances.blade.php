@extends('Master.layout')
@extends('Enseignant.Ens-dashboard')

<title>Séances</title>

@section('vue')
{{ __('Séances') }}
@endsection
@section('content2')

@foreach($seances as $seance)
<!--Modal create-->
<div id="m_affiche_{{$seance->ID_Seance}}" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <br>
                <h5 class="modal-title">Afficher Rapport Mensuel de Presence</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form role="form" method="get" action="{{route('presence.mensuelle', $seance->ID_Seance )}}">
                    @csrf 
                    <div class="form-group">
                        <br>
                        <label class="control-label" >&nbsp; Mois</label>
                        <div>
                            <br>
                            <input type="month" name="mois" max="2023-07" class="form-control input-lg">
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label">&nbsp; Elève</label>
                        <div>
                        <select name="ID_Eleve"   class="form-control" >
                                    @foreach($eleves as $eleve) 
                                          <option value="{{ $eleve->ID_Eleve }}">{{ $eleve->Nom }} {{ $eleve->Prenom }}</option>
                                    @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <br><br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Afficher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Rest of the code for displaying seances-->
@endforeach


<!-- message de succes -->
@if(session()->has('success')) 
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('success') }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif <br>

<div class="container mt-3">
   <h2>Séances</h2>
	  <table class="table"> 
		
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
                    <a type="button" class="btn btn-primary" href="{{route('liste',$seance->ID_Seance)}}">Gérer la présence</a>
					<a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#m_affiche_{{$seance->ID_Seance}}"  >Présence du mois</a>
                    </div>
					
				</td>
				 
			</tr>
		@endforeach
			<br>
			
		</tbody>
		
	</table>
</div>

 

@endsection