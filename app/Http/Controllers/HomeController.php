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
            $type_personne = DB::table('users')->select('statut')->where('id',Auth::id())->pluck('statut');
            session(['type_personne' => $type_personne[0]]);
            $gerants = DB::table('entreprise')->select('id_gerant')->pluck('id_gerant');
            session(['aEntreprise' => false]);
            foreach($gerants as $gerant){
                if($gerant==Auth::id()){
                    session(['aEntreprise' => true]);
                }
            }
        }

        return view('home');
    }
}
