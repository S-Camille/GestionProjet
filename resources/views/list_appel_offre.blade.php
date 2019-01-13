@extends('layouts.app')

@section('content')
<div class="container">        
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading bigFont">Liste d'appel d'offre</div>
                    <div class="panel-body list">
                        <div class="row">
                            <div class="col-xs-3 col-md-3">Titre</div><div class="col-xs-6 col-md-7">Description</div><div class="col-md-2">Date de fin</div>                            
                        </div>
                        @if(sizeof($appel_offre)!=0)
                            @for ($i = 0; $i < sizeof($appel_offre); $i++)
                                <div class="row">
                                    <div class="col-xs-3 col-md-3">$appel_offre[$i]->titre</div><div class="col-xs-6 col-sd-7 col-md-7">$appel_offre[$i]->description</div><div class="col-sd-2 col-md-2">$appel_offre[$i]->date_fin</div>
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