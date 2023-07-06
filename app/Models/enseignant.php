<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class enseignant extends Model

{
    protected $fillable = ['CIN','Nom','Prenom','Num_Telephone'] ;
    protected $primaryKey = 'ID_Enseignant';

   

    public function matieres(): HasMany
    {
        return $this->hasMany(matiere::class);
    }
    
}
