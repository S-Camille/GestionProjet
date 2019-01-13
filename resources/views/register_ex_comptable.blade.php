@extends('layouts.form')

@section('formName')

    @if(session('type_personne')=='commanditaire')
    Enregistrement d'entreprise    
    @elseif(session('type_personne')=='soumissionnaire')
    Enregistrement du lieu de travail        
    @endif

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
@endsection

@section('btnSubmitContent')
    Ajouter
@endsection