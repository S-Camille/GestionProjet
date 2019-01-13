<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class AppelOffre extends Model
{
    protected $table = "appel_offre";
    protected $keyType = "string";
    public $incrementing = false;
    
    protected $fillable = [
        'titre', 'description', 'date_debut','date_fin'
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }

    public function isValid(){
        if(empty($this->titre)){
            $this->errors[] = _('Vous devez rentrer un titre pour l\'appel d\'offre');
        }
        if(empty($this->description)){
            $this->errors[] = _('Vous devez rentrer une description pour l\'appel d\'offre');
        }
        if(empty($this->date_debut)){
            $this->errors[] = _('Vous devez rentrer une date de début pour l\'appel d\'offre');
        }
        if(empty($this->date_fin)){
            $this->errors[] = _('Vous devez rentrer une date de fin pour l\'appel d\'offre');
        }
        
        return empty($this->errors);
    }
}
