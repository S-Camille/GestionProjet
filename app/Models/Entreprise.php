<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Entreprise extends Model
{
    protected $table = "entreprise";
    protected $keyType = "string";
    protected $incrementing = false;

    protected $fillable = [
        'nom', 'statut', 'siret','effectif'
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }
}
