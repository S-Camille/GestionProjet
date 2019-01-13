<?php

namespace App\Http\Controllers;

use App\ExerciceComptable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;

class registerExComptableController extends Controller
{
    protected function create(Request $request){
        $idEntreprise = DB::table('entreprise')->select('id')->where('id_gerant',Auth::id())->pluck('id');
        $data = array(
            'id'=>Uuid::generate(),
            'id_entreprise'=>$idEntreprise[0],
            'annee' => date('Y',strtotime("-1 year")),
            'chiffre' => $request->input('chiffre'),
        );

        ExerciceComptable::create($data, [
            'id' => $data['id'],
            'id_entreprise' => $data['id_entreprise'],
            'annee' => $data['annee'],
            'chiffre' => $data['chiffre'],        
        ]);        

        return redirect(action('HomeController@index'));
    }

    protected function index(){
        return view('register_ex_comptable');
    }
}