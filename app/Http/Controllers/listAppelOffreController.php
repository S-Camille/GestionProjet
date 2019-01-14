<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class listAppelOffreController extends Controller
{
    protected function index(){
        $appel_offre = DB::table('appel_offre')->orderBy('date_debut')->get();

        return view('list_appel_offre')->with('appel_offre',$appel_offre);
    }
}
