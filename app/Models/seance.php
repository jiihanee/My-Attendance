<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class seance extends Model
{
    protected $fillable = ['Heure','Jour','Type','ID_Matiere'] ;
    protected $primaryKey = 'ID_Seance';
    public function matiere(): BelongsTo
    {
        return $this->belongsTo(matiere::class,'ID_Matiere','ID_Matiere') ;
    }
    public function presences(): HasMany
    {
        return $this->hasMany(presence::class);
    }

}
