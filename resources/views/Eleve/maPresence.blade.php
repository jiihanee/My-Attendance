@extends('Master.layout')
@extends('Eleve.Eleve-dashboard')

@section('vue')
    Ma Présence
@endsection
<title>Rapport de présence</title>

@section('content2')
    <br><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Veuillez Choisir</div>
                    <div class="card-body">
                        <div class="text-center">
                            <b>le rapport de présence d'un jour précis </b><br><br>
                            <!-- Modal pour la date -->
                            <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#m_affiche_date">Choisir Jour</a>

                            <div id="m_affiche_date" class="modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <br>
                                            <h5 class="modal-title">Choisir une date</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="get" action="{{ route('pres') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <br>
                                                    <label class="control-label">&nbsp; Date</label>
                                                    <div>
                                                        <br>
                                                        <input type="date" name="date_pres" class="form-control input-lg">
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

                            <br><br>

                            <b>le rapport de présence d'un mois :</b><br><br>
                            <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#m_affiche_mois">Choisir Mois</a>

                            <div id="m_affiche_mois" class="modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <br>
                                            <h5 class="modal-title">Choisir un Mois</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="get" action="{{ route('pres') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <br>
                                                    <label class="control-label">&nbsp; Mois</label>
                                                    <div>
                                                        <br>
                                                        <input type="month" name="mois_pres" class="form-control input-lg">
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
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
    <br><br>
@endsection
