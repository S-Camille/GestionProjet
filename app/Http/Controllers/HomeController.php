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

            if($type_personne=='soumissionnaire'){ 
                $hasEntreprise = DB::table('entreprise')->select('id')->where('id_gerant',Auth::id())->pluck('id');
                session(['no_structure' => empty($hasEntreprise]);
              
                if(isset($hasEntreprise[0])){
                    session(['no_structure' => false]);
                    $hasExComptable = DB::table('exercice_comptable')->select('id')->where('id_entreprise',$hasEntreprise[0])->pluck('id');
                    session(['no_ex_comptable' => empty($hasExComptable]);
                }
            }
            
            session(['type_personne' => $type_personne]);
        }
        return view('home');
    }
}
