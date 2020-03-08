<?php

namespace App\Http\Controllers;

use App\Models\CategorieDepense;
use Illuminate\Http\Request;

class CategorieDepenseController extends Controller
{

    public function index() {
        return CategorieDepense::all();
    }
}
