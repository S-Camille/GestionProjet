@extends('layouts.form')

@section('formName')
    Création d'appel d'offre
@endsection

@section('formHead')
    <form class="form-horizontal" method="POST" action="{{ route('creation_appel_offre') }}">
@endsection

@section('formContent')          
    <div class="form-group row">
        <label for="titre" class="obligatoire col-sm-4 col-form-label text-md-right">Titre</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="titre" id="titre" required autofocus/>
            </div>
    </div>
    <div class="form-group row">
        <label for="description" class="obligatoire col-sm-4 col-form-label text-md-right">Description</label>
            <div class="col-md-6">
                <textarea style="resize:none;" class="form-control" name="description" id="description" required></textarea>
            </div>
    </div>
    <div class="form-group row">
        <label for="date_debut" class="obligatoire col-sm-4 col-form-label text-md-right">Date de début</label>
            <div class="col-md-6">
                <input class="form-control" type="date" name="date_debut" id="date_debut" required />
            </div>
    </div>
    <div class="form-group row">
        <label for="date_fin" class="obligatoire col-sm-4 col-form-label text-md-right">Date de fin</label>
            <div class="col-md-6">
                <input class="form-control" type="date" name="date_fin" id="date_fin" required />
            </div>
    </div>
@endsection

@section('btnSubmitContent')
Créer
@endsection