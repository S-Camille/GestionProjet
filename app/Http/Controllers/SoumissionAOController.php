<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoumissionAOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = DB::table('soumission_appelOffre')
            ->where('id_soumissionnaire', Auth::user()->id)
            //->orWhere('id_appelOffre', Auth::user()->id)   
            ->get();
        return view('SoumissionAOList', compact('liste'));       
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
        DB::table('soumission_appelOffre')->insert([
            ['id_appelOffre' => $request->input('id_appelOffre'), 
             'id_soumissionnaire' => $request->input('id_soumissionnaire'),]
        ]);
        
        return redirect(url('/SoumissionAOList'));    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soumission = DB::table('soumission_appelOffre')->where('id', '=', $id)->get();
        return view('soumissionAO', compact('soumission'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('soumission_appelOffre')
            ->where('id', $id)->delete();
        
        return redirect(url('/SoumissionAOList'));    }
}
