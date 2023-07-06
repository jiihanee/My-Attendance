@extends('Master.layout')
@extends('Admin.admin-dashboard')

@section('title') Modifier Séance @endsection

@section('vue')
{{ __('Modifier Séance') }}
@endsection

@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Modifier</div>
                <div class="card-body">
                    <form role="form" method="POST" action =" {{route('seance.update', $seance->ID_Seance)}} ">
                        @csrf
                        <div class="form-group">
                            <br>
                            <label class="control-label">&nbsp; Type de Séance</label><br><br>
                            <select name="Type" class="form-control input-lg">
                                <option value="Cours"  @if($seance->Type == "Cours") selected @endif>Cours</option>
                                <option value="TD"   @if($seance->Type == "TD") selected @endif>TD</option>
                                <option value="TP" @if($seance->Type == "TP") selected @endif>TP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <br>
                            <label class="control-label">&nbsp; Jour </label><br><br>
                            <select name="Jour" class="form-control input-lg">
                                <option value="1" @if($seance->Jour == "1") selected @endif>Lundi</option>
                                <option value="2" @if($seance->Jour == "2") selected @endif> Mardi</option>
                                <option value="3" @if($seance->Jour == "3") selected @endif> Mercredi</option>
                                <option value="4"@if($seance->Jour == "4") selected @endif> Jeudi</option>
                                <option value="5"@if($seance->Jour == "5") selected @endif> Vendredi</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label" class="form-control input-lg">&nbsp; Heure Séance</label><br>
                            <input type="time" name="Heure" min="08:00" max="18:00" class="form-control input-lg" value="{{$seance->Heure}}" required><br>
                            <div class="text-center"><small>Heures de travail de 8 heures matin à 6 heures soir</small></div>
                            <div class="form-group">
                                <input type="text" name='ID_Matiere' value="{{ $matiere->ID_Matiere}}" hidden>
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
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>


                        @endsection