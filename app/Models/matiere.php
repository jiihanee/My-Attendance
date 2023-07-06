<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class matiere extends Model
{
    protected $fillable = ['Nom','ID_Enseignant','ID_Classe'] ;
    protected $primaryKey = 'ID_Matiere';
    
    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(enseignant::class,'ID_Enseignant','ID_Enseignant') ;
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(classe::class,'ID_Classe','ID_Classe') ;
    }

    public function seances(): HasMany
    {
        return $this->hasMany(seance::class);
    }
}
