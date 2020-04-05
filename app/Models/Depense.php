<?php

namespace App\Models;

use App\Models\Etape;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depense extends Model
{
    use SoftDeletes;

    protected $fillable = ['libelle', 'etape_id', 'categorie_depenses_id', 'observation', 'commentaires', 'cout',
        'paye', 'date_activite', 'is_ok'];

    public function CategorieDepense() {
        return $this->belongsTo(CategorieDepense::class, 'categore_depenses_id');
    }

    public function Etape() {
        return $this->belongsTo(Etape::class);
    }
}
