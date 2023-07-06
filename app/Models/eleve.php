<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class eleve extends Model

{
    protected $fillable = ['ID_Parent','ID_Classe','CNE','Nom','Prenom','Date_De_Naissance','photo'] ;
    protected $primaryKey = 'ID_Eleve';
    protected $Date_De_Naissance = ['Date_De_Naissance'];
    
    public function presences(): HasMany
    {
        return $this->hasMany(presence::class);
    }
    
    public function parent_s(): BelongsTo
    {
        return $this->belongsTo(parent_::class,'ID_Parent','ID_Parent') ;
    }
    public function classes(): BelongsTo
    {
        return $this->belongsTo(classe::class,'ID_Classe','ID_Classe') ;
    }


}
