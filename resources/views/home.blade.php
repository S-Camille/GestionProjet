@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading centerText">Mon profil</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                                                
                        <div class="flex-container column">                        
                        @if(session('type_personne')=="commanditaire")
                            <div>Avant toute chose veuillez renseigner votre entreprise</div>
                            <a class="choice-btn" href="{{ route('register_structure') }}">Ajouter mon entreprise</a>
                        @elseif(session('type_personne')=="soumissionnaire")
                            <div>Avant toute chose veuillez renseigner votre lieu de travail</div>
                            <a class="choice-btn" href="{{ route('register_structure') }}">Ajouter mon lieu de travail</a>
                        @endif
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection