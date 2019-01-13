<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $statutResult = DB::table('users')->select('statut')->where('id',Auth::id())->pluck('statut');
            $type_personne=$statutResult[0];
        
            $hasEntreprise = DB::table('structure')->select('id')->where('id_representant',Auth::id())->pluck('id');
            session(['no_structure' => (sizeof($hasEntreprise)==0)]);
            
                if($type_personne=='soumissionnaire'){ 
                if(isset($hasEntreprise[0])){
                    $hasExComptable = DB::table('exercice_comptable')->select('id')->where('id_entreprise',$hasEntreprise[0])->pluck('id');
                    session(['no_ex_comptable' => (sizeof($hasExComptable)==0)]);
                    if(isset($hasExComptable[0])){
                        return redirect(action('listAppelOffreController@index'));
                    }
                }
            }
            
            session(['type_personne' => $type_personne]);
        }
        return view('home');
    }
}
