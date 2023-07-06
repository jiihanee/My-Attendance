<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class parent_ extends Model
{    
    protected $fillable = ['CIN','Nom','Prenom','NUM_Telephone'] ;
    protected $primaryKey = 'ID_Parent';
    protected $table = "parent_s";
    public function eleves(): HasMany
    {
        return $this->hasMany(eleve::class);
    }
}
