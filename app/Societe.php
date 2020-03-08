<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
     protected $fillable = ['libelle', 'adresse','tel','fax','email','code_postal','registre_commercial','matricule_fiscal'];
}
