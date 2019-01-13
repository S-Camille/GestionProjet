<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Attestation extends Model
{
    protected $table = "attestation";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'type', 'is_valid', 'lien',
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }

    public function isValid(){
        if(empty($this->id_entreprise)){
            $this->errors[] = _('Vous devez choisir une entreprise concerné par cette attestation');
        }
        if(empty($this->type)){
            $this->errors[] = _('Vous devez rentrer un type d\'attestation');
        }
        if(empty($this->is_valid)){
            $this->errors[] = _('Vous devez rentrer un statut valide ou non pour l\'attestation');
        }
        if(empty($this->lien)){
            $this->errors[] = _('Vous devez fournir un exemplaire de l\'attestation');
        }
        
        return empty($this->errors);
    }
}
