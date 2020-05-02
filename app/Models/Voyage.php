<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voyage extends Model
{
    use SoftDeletes;

    //protected $fillable = ['title', 'date_debut'];

    public function etapes() {
        return $this->hasMany(Etape::class);
    }
}
