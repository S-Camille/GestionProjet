<?php

namespace App\Http\Controllers;

use App\Entreprise;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;

class registerStructureController extends Controller
{
    protected function create(Request $request){
        $data = array(
            'id'=>Uuid::generate(),
            'id_gerant'=>Auth::id(),
            'nom' => $request->input('nom'),
            'siret' => $request->input('siret'),
            'voirie' => $request->input('voirie'),
            'ville' => $request->input('ville'),
            'effectif' => $request->input('effectif'),
            'code_postal' => $request->input('code_postal'),
        );

        Entreprise::create($data, [
            'id' => $data['id'],
            'id_gerant' => $data['id_gerant'],
            'nom' => $data['nom'],
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