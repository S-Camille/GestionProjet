@extends('default')

@section('title')
    @foreach($liste as $appel)
        {{$appel->titre}}
    @endforeach
@endsection

@section('link')
    <link rel="stylesheet" href="{{ asset('/css/detail.css') }}">
@endsection

@section('content')
    @foreach($liste as $appel)
        <div class="container">
            <h1>{{$appel->titre}}</h1>
        </div>

        <div class="container">
            <div>
                <p>Description : {{$appel->description}}</p>
                <p>Date de début : {{$appel->date_debut}}</p>
                <p>Date de fin : {{$appel->date_fin}}</p>
            </div>
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-secondary">Retour</button></a>
        </div>
    @endforeach
@endsection