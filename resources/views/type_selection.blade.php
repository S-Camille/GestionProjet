@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading centerText">Vous êtes un :</div>

                <div class="panel-body">
                    <div class="flex-container">
                        <a href="{{ route('register') }}" class="choice-btn">Gérant d'entreprise</a>
                        <a href="{{ route('register') }}" class="choice-btn">Maître d'ouvrage</a>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection