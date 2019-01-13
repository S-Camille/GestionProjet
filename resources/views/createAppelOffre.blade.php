@extends('default')

@section('title')
    Création d'appel d'offre
@endsection


@section('link')
    <link rel="stylesheet" href="{{ asset('/css/detail.css') }}">
@endsection

@section('content')

<div class="container" style="margin-top: 25px">
    <h1>Nouvel appel d'offre</h1>
</div>

<div class="container" style="margin-top: 25px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un appel d'offre</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="titre" class="col-sm-4 col-form-label text-md-right">Titre : </label>
                                    <div class="col-md-6">
                                        <input type="text" name="titre" id="titre" required />
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label text-md-right">Description : </label>
                                    <div class="col-md-6">
                                        <input type="textarea" name="description" id="description" required />
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_debut" class="col-sm-4 col-form-label text-md-right">Date de début : </label>
                                    <div class="col-md-6">
                                        <input type="date" name="date_debut" id="date_debut" required />
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_fin" class="col-sm-4 col-form-label text-md-right">Date de fin : </label>
                                    <div class="col-md-6">
                                        <input type="date" name="date_fin" id="date_fin" required />
                                    </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <input type="submit" value="Créer l'appel d'offre"/>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection