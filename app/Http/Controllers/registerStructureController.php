<?php

namespace App\Http\Controllers;

use App\Structure;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;

class registerStructureController extends Controller
{
    protected function create(Request $request){
        if($request->input('nom')!=null){
            $nom = $request->input('nom');
        }else{
            $nom = $request->input('type_structure')." de ".$request->input('ville');
        }
        
        if($request->input('siret')!=null){
            $statut = 1;
            $siret = $request->input('siret');
        }else{
            $statut = 0;
            $siret = null;
        }
        

        $data = array(
            'id'=>Uuid::generate(),
            'id_representant'=>Auth::id(),
            'nom' => $nom,
            'statut' => $statut,
            'siret' => $siret,
            'voirie' => $request->input('voirie'),
            'ville' => $request->input('ville'),
            'effectif' => $request->input('effectif'),
            'code_postal' => $request->input('code_postal'),
        );

        Structure::create($data, [
            'id' => $data['id'],
            'id_representant' => $data['id_representant'],
            'nom' => $data['nom'],
            'statut'=> $data['statut'],
            'voirie' => $data['voirie'],
            'ville' => $data['ville'],
            'siret' => $data['siret'],
            'effectif' => $data['effectif'],
            'code_postal' => $data['code_postal'],
        ]);        

        return redirect(action('HomeController@index'));
    }

    protected function index(){
        return view('register_structure');
    }
}