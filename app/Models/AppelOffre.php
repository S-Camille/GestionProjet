<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class AppelOffre extends Model
{
    protected $table = "appel_offre";
    protected $keyType = "string";
    protected $incrementing = false;
    
    protected $fillable = [
        'titre', 'description', 'date_debut','date_fin'
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }
}
