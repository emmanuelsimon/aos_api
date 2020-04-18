<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etape extends Model
{
    use SoftDeletes;

    protected $fillable = ['description', 'lat', 'long', 'step'];

    public function Depenses() {
        return $this->hasMany(Depense::class, 'etape_id');
    }

    public function Voyage() {
        return $this->belongsTo(Voyage::class);
    }

}
