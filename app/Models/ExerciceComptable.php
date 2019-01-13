<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class ExerciceComptable extends Model
{
    protected $table = "exercice_comptable";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'id','id_entreprise','annee', 'chiffre'
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }
}
