<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use Illuminate\Http\Request;

class EtapeController extends Controller
{
    public function index() {
        return Etape::all();
    }
}
