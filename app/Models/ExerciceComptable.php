<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciceComptable extends Model
{
    protected $table = "exercice_comptable";
    protected $keyType = "string";
    protected $incrementing = false;

    protected $fillable = [
        'annee', 'chiffre'
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }
}
