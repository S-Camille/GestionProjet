<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class profilController extends Controller
{
    protected function index($id_structure){
        $info_entreprise=null;
        $info_gerant=null;
        $id_gerant=null;
        $appel_offre=null;

        //Get firm information
        $info_entreprise = DB::table('structure')->select('nom','ville','effectif','voirie','code_postal')->where('id',$id_structure)->get();        

        //Firm exists
        if(isset(($info_entreprise)[0])){
            //Get id_gerant
            $id_gerant = DB::table('structure')->select('id_representant')->where('id',$id_structure)->get();
            
            if($id_gerant[0]->id_representant==Auth::id()){
                session(['isSelfProfil'=>true]);
            }else{
                session(['isSelfProfil'=>false]);
            }

            //Get gerant information
            $info_gerant = DB::table('users')->select('firstname','lastname','telephone','email','statut')->where('id',$id_gerant[0]->id_representant)->get();                        

            //Get every appel_offre
            $appel_offre = DB::table('appel_offre')->select('titre','description','date_fin')->where('id',$id_structure)->get();

            return view('profil')->with('appel_offre',$appel_offre)->with('info_entreprise',$info_entreprise)->with('info_gerant',$info_gerant);
        }else{ //no firm with this id
            return abort(404);        
        }
    }
}