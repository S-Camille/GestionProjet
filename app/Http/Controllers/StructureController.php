<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = DB::table('structure')->get();
        return view('StructureList', compact('liste'));    
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
        DB::table('structure')->insert([
            ['id_gerant' => Auth::user()->id, 
             'nom' => $request->input('nom'),
             'statut' => $request->input('statut'),
             'voirie' => $request->input('voirie') , 
             'ville' => $request->input('ville'), 
             'code_postal' => $request->input('code_postal'),
             'siret' => $request->input('siret'),
             'effectif' => $request->input('effectif'),]
        ]);
        
        return redirect(url('/StructureList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $structure = DB::table('structure')->where('id', '=', $id)->get();
        return view('structure', compact('strucure'));
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
        DB::table('structure')
            ->where('id', $id)
            ->update(['nom' => $request->input('nom')]);
        
        DB::table('structure')
            ->where('id', $id)
            ->update(['voirie' => $request->input('voirie')]);
        
        DB::table('structure')
            ->where('id', $id)
            ->update(['ville' => $request->input('ville')]);
        
        DB::table('structure')
            ->where('id', $id)
            ->update(['code_potal' => $request->input('code-postal')]);
        
        DB::table('structure')
            ->where('id', $id)
            ->update(['siret' => $request->input('siret')]);
        
        DB::table('structure')
            ->where('id', $id)
            ->update(['effectif' => $request->input('effectif')]);
        
        return StructureController::show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('structure')->where('id', $id)->delete();
        return redirect(url('/StructureList'));
    }
}
