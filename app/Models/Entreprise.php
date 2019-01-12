<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Entreprise extends Model
{
    protected $table = "entreprise";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'id','id_gerant','nom','voirie','ville','siret','effectif','code_postal'
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }
}
