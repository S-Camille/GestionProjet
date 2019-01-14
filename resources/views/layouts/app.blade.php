<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/MarchésPublicsFaciles.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Connexion</a></li>
                            <li><a href="{{ url('type_selection') }}">Enregistrement</a></li>
                        @else                    
                            @if(session('type_personne')=='commanditaire' && !session('no_structure') && !session('no_ex_comptable'))
                                <li class="create_appel_offre_header"><a href="{{route('register_appel_offre')}}">Créer un appel d'offre</a></li>
                            @endif        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hover-all" style="display:none;position: absolute;background: rgba(0,0,0,0.4);height: 100%;top: 0;width: 100%;left: 0;z-index: 2;">        
        <div class="panel col-md-4" style="height:370px; margin: auto; position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
            <div onclick="this.parentNode.parentNode.style.display='none'" style="cursor:pointer;position: absolute;right: 0;margin: 1%;" class="cross-pop-up">X</div>    
            <div class="panel-heading bigFont centerText">Détail appel d'offre</div>            
            <div class="panel-body">
                <label class="control-label">Titre</label><div class="titre"></div>
                <label class="control-label">Description</label><div class="description"></div>
                <label class="control-label">Date début</label><div class="dtdeb"></div>
                <label class="control-label">Date fin</label><div class="dtfin"></div>
                <button class="btn">Notifier le MOA de mon intérêt</button>
            </div>
        </div>    
    </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>   
    <script>
        function get_detail_appel(id_appel){
            var xhttp = new XMLHttpRequest();
            var data = null;

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $data = JSON.parse(xhttp.response);
                    console.log($data);                    
                    
                    var hoverAll = document.getElementById('hover-all');
                    var titre = document.getElementsByClassName('titre')[0];
                    var description = document.getElementsByClassName('description')[0];
                    var dtdeb = document.getElementsByClassName('dtdeb')[0];
                    var dtfin = document.getElementsByClassName('dtfin')[0];

                    titre.innerHTML = $data.titre;
                    description.innerHTML = $data.description;
                    dtdeb.innerHTML = $data.date_debut;
                    dtfin.innerHTML = $data.date_fin;

                    hoverAll.style.display='block';
                }
            };
            xhttp.open("GET", "http://localhost/GestionProjet/public/detail/"+id_appel, true);
            xhttp.send();            
        }
    </script> 
</body>
</html>
