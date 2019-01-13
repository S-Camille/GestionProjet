<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Uuids;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    protected $keyType = "string";
    public $incrementing = false;
    public $errors = [];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','firstname', 'lastname', 'email','telephone','statut','presentation','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function findAll(){
        return $this::all();
    }

    public function findById($id){
        return $this::find($id);
    }

    public function isValid(){
        if(empty($this->firstname)){
            $this->errors[] = _('Vous devez rentrer un prénom');
        }
        if(empty($this->lastname)){
            $this->errors[] = _('Vous devez rentrer un nom');
        }
        if(empty($this->telephone)){
            $this->errors[] = _('Vous devez rentrer un numéro de téléphone');
        }
        if(empty($this->email)){
            $this->errors[] = _('Vous devez rentrer une adresse email');
        } else if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $this->errors[] = _('Vous devez rentrer une adresse email valide');
        }
        if(empty($this->statut)){
            $this->errors[] = _('Vous devez indiquer votre statut');
        }
        if(empty($this->password)){
            $this->errors[] = _('Vous devez rentrer un mot de passe');           
        }
        return empty($this->errors);
    }
}
