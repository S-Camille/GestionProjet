<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = DB::table('appel_offre')->get();
        return view('appelOffreList', compact('liste'));
    }

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
        DB::table('appel_offre')->insert([
            ['id_commanditaire' => Auth::user()->id, 
             'titre' => $request->input('titre'),
             'description' => $request->input('description') , 
             'date_debut' => $request->input('date_debut'), 
             'date_fin' => $request>input('date_fin')]
        ]);
        
        return redirect(url('/AppelOffreList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ao = DB::table('appel_offre')->where('id', '=', $id)->get();
        return view('appelOffre', compact('ao'));
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
        DB::table('appel_offre')
            ->where('id', $id)
            ->update(['titre' => $request->input('titre')]);
        
        DB::table('appel_offre')
            ->where('id', $id)
            ->update(['description' => $request->input('description')]);
        
        DB::table('appel_offre')
            ->where('id', $id)
            ->update(['date_debut' => $request->input('date_debut')]);
        
        DB::table('appel_offre')
            ->where('id', $id)
            ->update(['date_fin' => $request->input('date_fin')]);
        
        return AOController::show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('appel_offre')
            ->where('id', $id)->delete();
        
        return redirect(url('/AppelOffreList'));
    }
}
