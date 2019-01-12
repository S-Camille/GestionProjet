<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Attestation extends Model
{
    protected $table = "attestation";
    protected $keyType = "string";
    protected $incrementing = false;

    protected $fillable = [
        'type', 'is_valid', 'lien',
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }
}
