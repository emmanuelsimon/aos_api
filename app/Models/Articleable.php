<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articleable extends Model
{

    protected $table = 'articleable';
    public $timestamps = true;
    protected $fillable = array('articleable_id', 'articleable_type');

}
