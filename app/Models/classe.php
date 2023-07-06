<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



class classe extends Model
{
    protected $fillable = ['libele'] ;
    protected $primaryKey = 'ID_Classe';

    public function eleves(): HasMany
    {
        return $this->hasMany(eleve::class);
    }
    public function matieres(): HasMany
    {
        return $this->hasMany(matiere::class);
    }

  

}
