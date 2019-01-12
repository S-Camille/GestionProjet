@extends('layouts.form')

@section('formName')
Enregistrement
@endsection

@section('formHead')
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
@endsection

@section('formContent')
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label obligatoire">Nom</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
        <label for="surname" class="col-md-4 control-label obligatoire">Prénom</label>

        <div class="col-md-6">
            <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

            @if ($errors->has('surname'))
                <span class="help-block">
                    <strong>{{ $errors->first('surname') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('téléphone') ? ' has-error' : '' }}">
        <label for="téléphone" class="col-md-4 control-label obligatoire">Numéro de téléphone</label>

        <div class="col-md-6">
            <input id="téléphone" maxlength="10" class="form-control" name="téléphone" value="{{ old('téléphone') }}" required autofocus>

            @if ($errors->has('téléphone'))
                <span class="help-block">
                    <strong>{{ $errors->first('téléphone') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('statut') ? ' has-error' : '' }}">
        <label for="statut" class="col-md-4 control-label obligatoire">Statut</label>

        <div class="col-md-6">
            <select id="statut" maxlength="10" class="form-control" name="statut" value="{{ old('statut') }}" required>
                <option value="commanditaire">Commanditaire</option>
                <option value="soumissionnaire">Soumissionnaire</option>
            </select>

            @if ($errors->has('statut'))
                <span class="help-block">
                    <strong>{{ $errors->first('statut') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label obligatoire">Adresse E-Mail</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('presentation') ? ' has-error' : '' }}">
        <label for="presentation" class="col-md-4 control-label">Présentation</label>

        <div class="col-md-6">
            <textarea id="presentation" class="form-control" name="presentation" value="{{ old('presentation') }}" style="resize:none;"></textarea>

            @if ($errors->has('presentation'))
                <span class="help-block">
                    <strong>{{ $errors->first('presentation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label obligatoire">Mot de passe</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label obligatoire">Confirmation mot de passe</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
@endsection

@section('btnSubmitContent')
    S'enregistrer
@endsection