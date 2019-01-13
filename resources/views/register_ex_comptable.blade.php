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

    <div class="form-group{{ $errors->has('urssaf') ? ' has-error' : '' }}">
        <label for="urssaf" class="col-md-4 control-label obligatoire">Lien de l'attestation urssaf</label>

        <div class="col-md-6">
            <input id="urssaf" type="text" class="form-control" name="urssaf" value="{{ old('urssaf') }}" required autofocus>

            @if ($errors->has('urssaf'))
                <span class="help-block">
                    <strong>{{ $errors->first('urssaf') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('fiscale') ? ' has-error' : '' }}">
        <label for="fiscale" class="col-md-4 control-label obligatoire">Lien de l'attestation fiscale</label>

        <div class="col-md-6">
            <input id="fiscale" type="text" class="form-control" name="fiscale" value="{{ old('fiscale') }}" required autofocus>

            @if ($errors->has('fiscale'))
                <span class="help-block">
                    <strong>{{ $errors->first('fiscale') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('assurance') ? ' has-error' : '' }}">
        <label for="assurance" class="col-md-4 control-label obligatoire">Lien de l'attestation d'assurance</label>

        <div class="col-md-6">
            <input id="assurance" type="text" class="form-control" name="assurance" value="{{ old('assurance') }}" required autofocus>

            @if ($errors->has('assurance'))
                <span class="help-block">
                    <strong>{{ $errors->first('assurance') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('qualifPro') ? ' has-error' : '' }}">
        <label for="qualifPro" class="col-md-4 control-label obligatoire">Lien de l'attestation de qualification professionnelle</label>

        <div class="col-md-6">
            <input id="qualifPro" type="text" class="form-control" name="qualifPro" value="{{ old('qualifPro') }}" required autofocus>

            @if ($errors->has('qualifPro'))
                <span class="help-block">
                    <strong>{{ $errors->first('qualifPro') }}</strong>
                </span>
            @endif
        </div>
    </div>

@endsection

@section('btnSubmitContent')
    Ajouter
@endsection