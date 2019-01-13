<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = DB::table('attestation')->get();
        return view('attestationListe', compact('liste'));    }

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
        DB::table('attestation')->insert([
            ['id_entreprise' => $request->input('id_entreprise'),
            'type' => $request->input('type'),
            'lien' => $request->input('lien')]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attestation = DB::table('attestation')->where('id', '=', $id)->get();
        return view('attestation', compact('attestation'));
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
        DB::table('attestation')
            ->where('id', $id)
            ->update(['type' => $request->input('type')]);
        
        DB::table('attestation')
            ->where('id', $id)
            ->update(['lien' => $request->input('lien')]);
        
        return AttestationController::show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('attestation')->where('id', $id)->delete();
        return redirect(url('/AttestationList'));
    }
}
