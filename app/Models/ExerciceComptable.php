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
        'id','id_entreprise','annee', 'chiffre','effectif','lien_urssaf','lien_fiscale','lien_assurance','lien_qualifPro'
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }

    public function isValid(){
        if(empty($this->id_entreprise)){
            $this->errors[] = _("Vous devez choisir l'entreprise concerné par cet exercice comptable");
        }
        if(empty($this->annee)){
            $this->errors[] = _("Vous devez choisir une année pour cet exercice comptable");
        }
        if(empty($this->chiffre)){
            $this->errors[] = _('Vous devez rentrer un chiffre pour cet exercice comptable');
        }
        
        return empty($this->errors);
    }
}
