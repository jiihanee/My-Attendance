<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class presence extends Model
{

    protected $fillable = ['ID_Seance', 'ID_Eleve', 'etat'];
    protected $primaryKey = 'ID_Presence';

    public function eleve(): BelongsTo
    {
        return $this->belongsTo(eleve::class, 'ID_Eleve', 'ID_Eleve');
    }
    public function seance(): BelongsTo
    {
        return $this->belongsTo(seance::class, 'ID_Seance', 'ID_Seance');
    }
}
