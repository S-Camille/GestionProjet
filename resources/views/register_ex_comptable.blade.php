@extends('layouts.form')

@section('formName')

    Enregistrement de l'exercice comptable

@endsection

@section('formHead')
    <form class="form-horizontal" method="POST" action="{{ route('creation_ex_comptable') }}">
@endsection

@section('formContent') 
    <div class="form-group{{ $errors->has('chiffre') ? ' has-error' : '' }}">
        <label for="chiffre" class="col-md-4 control-label obligatoire">Dernier chiffre d'affaire</label>

        <div class="col-md-6">
            <input id="chiffre" type="text" class="form-control" name="chiffre" value="{{ old('chiffre') }}" required autofocus>

            @if ($errors->has('chiffre'))
                <span class="help-block">
                    <strong>{{ $errors->first('chiffre') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('effectif') ? ' has-error' : '' }}">
        <label for="effectif" class="col-md-4 control-label obligatoire">Effectif</label>

        <div class="col-md-6">
            <input id="effectif" type="text" class="form-control" name="effectif" value="{{ old('effectif') }}" required autofocus>

            @if ($errors->has('effectif'))
                <span class="help-block">
                    <strong>{{ $errors->first('effectif') }}</strong>
                </span>
            @endif
        </div>
    </div>

@endsection

@section('btnSubmitContent')
    Ajouter
@endsection