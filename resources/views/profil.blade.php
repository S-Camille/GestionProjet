@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">             
                    <div class="panel-heading bigFont">{{$info_entreprise[0]->nom}}</div>
                    <div class="panel-body">                        
                        <label class="control-label">Ville</label><p>{{$info_entreprise[0]->ville}}</p>                        
                        <label class="control-label">Effectif</label><p>{{$info_entreprise[0]->effectif}}</p>                        
                        <a href="">Voir plus d'informations</a>
                    </div>                        
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading bigFont">Responsable</div>
                    <div class="panel-body">
                        <label class="control-label">Nom</label><p>{{$info_gerant[0]->lastname}}</p>
                        <label class="control-label">Prénom</label><p>{{$info_gerant[0]->firstname}}</p>  
                        <a href="">Voir plus d'informations</a>                              
                    </div>                        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading bigFont">Liste d'appel d'offre</div>
                    <div class="panel-body list">
                        <div style="background:lightblue;border-bottom:1px solid grey;" class="row">
                            <div class="col-xs-3 col-md-3">Titre</div><div class="col-xs-6 col-md-7">Description</div><div class="col-md-2">Date de fin</div>                            
                        </div>
                        @if(sizeof($appel_offre)!=0)
                            @for ($i = 0; $i < sizeof($appel_offre); $i++)
                                <div class="row list-elt">
                                    <div class="col-xs-3 col-md-3">{{$appel_offre[$i]->titre}}</div><div class="col-xs-6 col-sd-7 col-md-7">{{$appel_offre[$i]->description}}</div><div class="col-sd-2 col-md-2">{{$appel_offre[$i]->date_fin}}</div>
                                </div>
                            @endfor
                        @else
                            <div class="row">
                            <div class="col-md-10 centerText">
                                Aucun appel d'offre n'est disponible
                            </div>
                        @endif
                    </div>                        
                </div>
            </div>
        </div>
    </div>
@endsection