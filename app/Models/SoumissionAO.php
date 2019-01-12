<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoumissionAO extends Model
{
    protected $table = "soumission_appelOffre";
    protected $keyType = "string";
    protected $incrementing = false;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }
}
