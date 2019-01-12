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
    protected function validator(){
        return Validator::make($data, [
            'nom' => 'required|string|max:255',  
            'siret'=> 'required|string|max:255',
            'voirie' => 'required|string|max:255',  
            'ville' => 'required|string|max:255',                        
            'effectif'=> 'required|string|max:255',
            'code_postal' =>'required|string|max:255',
        ]);
    }

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

        return view('home');
    }

    protected function index(){
        return view('register_structure');
    }
}