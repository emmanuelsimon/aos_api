<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $fillable = ['description', 'lat', 'long', 'step'];

    public function Depenses() {
        return $this->hasMany('App\Models\Depense', 'etape_id');
    }

}
