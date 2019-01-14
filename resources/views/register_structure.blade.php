@extends('layouts.form')

@section('formName')

    @if(session('type_personne')=='soumissionnaire')
    Enregistrement d'entreprise    
    @elseif(session('type_personne')=='commanditaire')
    Enregistrement du lieu de travail        
    @endif

@endsection

@section('formHead')
    <form class="form-horizontal" method="POST" action="{{ route('register_structureCreation') }}">
@endsection

@section('formContent')
    @if(session('type_personne')=='soumissionnaire')
    <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
        <label for="nom" class="col-md-4 control-label obligatoire">Nom</label>

        <div class="col-md-6">
            <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>

            @if ($errors->has('nom'))
                <span class="help-block">
                    <strong>{{ $errors->first('nom') }}</strong>
                </span>
            @endif
        </div>
    </div>
    @elseif(session('type_personne')=='commanditaire')
        <div class="form-group{{ $errors->has('type_structure') ? ' has-error' : '' }}">
            <label for="type_structure" class="col-md-4 control-label obligatoire">Type de lieu</label>

            <div class="col-md-6">
                <select id="type_structure" type="text" class="form-control" name="type_structure" value="{{ old('type_structure') }}" required autofocus>
                    <option value="Mairie">Mairie</option>
                </select>

                @if ($errors->has('type_structure'))
                    <span class="help-block">
                        <strong>{{ $errors->first('type_structure') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    @endif

    <div class="form-group{{ $errors->has('voirie') ? ' has-error' : '' }}">
        <label for="voirie" class="col-md-4 control-label obligatoire">Voirie</label>

        <div class="col-md-6">
            <input id="voirie" type="text" class="form-control" name="voirie" value="{{ old('voirie') }}" required autofocus>

            @if ($errors->has('voirie'))
                <span class="help-block">
                    <strong>{{ $errors->first('voirie') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
        <label for="ville" class="col-md-4 control-label obligatoire">Ville</label>

        <div class="col-md-6">
            <input id="ville" type="text" class="form-control" name="ville" value="{{ old('ville') }}" required autofocus>

            @if ($errors->has('ville'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('code_postal') ? ' has-error' : '' }}">
        <label for="code_postal" class="col-md-4 control-label obligatoire">Code postal</label>

        <div class="col-md-6">
            <input id="code_postal" type="text" class="form-control" name="code_postal" value="{{ old('code_postal') }}" required autofocus>

            @if ($errors->has('code_postal'))
                <span class="help-block">
                    <strong>{{ $errors->first('code_postal') }}</strong>
                </span>
            @endif
        </div>
    </div>

    @if(session('type_personne')=="soumissionnaire")
    <div class="form-group{{ $errors->has('siret') ? ' has-error' : '' }}">
        <label for="siret" class="col-md-4 control-label obligatoire">Numéro de siret</label>

        <div class="col-md-6">
            <input id="siret" type="text" class="form-control" name="siret" value="{{ old('siret') }}" required autofocus>

            @if ($errors->has('siret'))
                <span class="help-block">
                    <strong>{{ $errors->first('siret') }}</strong>
                </span>
            @endif
        </div>
    </div>
    @endif
@endsection

@section('btnSubmitContent')
    Ajouter
@endsection