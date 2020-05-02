<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etape extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'lat', 'long', 'dateEtape', 'title', 'shortDescription', 'voyage_id'];

    protected $appends = ['color'];

    public function Voyage() {
        return $this->belongsTo(Voyage::class);
    }

    public function getColorAttribute() {
        return $this->voyage->color;
    }

}
