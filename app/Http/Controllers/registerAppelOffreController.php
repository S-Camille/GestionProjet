<?php

namespace App\Http\Controllers;

use App\AppelOffre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;

class registerAppelOffreController extends Controller
{
    protected function create(Request $request){
        $resultIdRequest = DB::table('structure')->select('id')->where('id_representant',Auth::id())->get();

        $data=[
            'id'=>Uuid::generate(),
            'id_commanditaire'=>$resultIdRequest[0]->id,
            'titre'=>$request->input('titre'),
            'description'=>$request->input('description'),
            'date_debut'=>$request->input('date_debut'),
            'date_fin'=>$request->input('date_fin'),
        ];

        AppelOffre::create($data,[
            'id'=>$data['id'],
            'id_commanditaire'=>$data['id_commanditaire'],
            'titre'=>$data['titre'],
            'description'=>$data['description'],
            'date_debut'=>$data['date_debut'],
            'date_fin'=>$data['date_fin'],
        ]);
        
        return redirect(action('HomeController@index'));
    }
}