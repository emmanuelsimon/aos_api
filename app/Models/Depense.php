<?php

namespace App\Models;

use App\Models\Etape;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = ['libelle', 'etape_id', 'categorie_depenses_id', 'observation', 'commentaires', 'cout',
        'paye'];

    public function CategorieDepense() {
        return $this->belongsTo(CategorieDepense::class);
    }

    public function Etape() {
        return $this->belongsTo(Etape::class);
    }
}
