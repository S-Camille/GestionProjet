<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Structure extends Model
{
    protected $table = "structure";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'id','id_representant','statut','nom','voirie','ville','siret','effectif','code_postal',
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }

    public function isValid(){
        if(empty($this->id_representant)){
            $this->errors[] = _('Vous devez choisir un représentant pour cette structure');
        }
        if(empty($this->nom)){
            $this->errors[] = _('Vous devez rentrer un nom d\'entreprise');
        }
        if(empty($this->voirie)){
            $this->errors[] = _('Vous devez rentrer un numéro et nim de rue');
        }
        if(empty($this->ville)){
            $this->errors[] = _('Vous devez rentrer une ville');
        }
        if(empty($this->code_postal)){
            $this->errors[] = _('Vous devez rentrer un code postal');
        }
        if(empty($this->statut)){
            $this->errors[] = _('Vous devez choisir un statut pour votre structure');
        } else if($this->statut){ //si c'est une entreprise
            if(empty($this->siret)){
                $this->errors[] = _('Vous devez indiquer le numéro de siret de l\'entreprise');
            } else if(strlen($this->siret) > 14){
                $this->errors[] = _('Siret trop long');
            }
            if(empty($this->effectif)){
                $this->errors[] = _('Vous devez rentrer un effectif');           
            }
        }
        
        return empty($this->errors);
    }
}
