<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExComptableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = DB::table('exercice_comptable')->get();
        return view('ExComptableList', compact('liste'));       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('exercice_comptable')->insert([
            ['id_structure' => $request->input('id_structure'), 
             'annee' => $request->input('anne'),
             'chiffre' => $request->input('chiffre'),]
        ]);
        
        return redirect(url('/ExComptableList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exC = DB::table('exercice_comptable')->where('id', '=', $id)->get();
        return view('exComptable', compact('exC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('exercice_comptable')
            ->where('id', $id)
            ->update(['annee' => $request->input('annee')]);
        
        DB::table('exercice_comptable')
            ->where('id', $id)
            ->update(['chiffre' => $request->input('chiffre')]);
        
        return ExComptableController::show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('exercice_comptable')->where('id', $id)->delete();
        return redirect(url('/ExComptableList'));    
    }
}
