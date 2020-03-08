<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function store(Request $request) {
        $inputs = $request->input();
        $depense = New Depense();
        $depense->libelle = $inputs['libelle'];
        $depense->etape_id = $inputs['etape'];
        $depense->categorie_depenses_id = $inputs['category'];
        $depense->observation = $inputs['observation'];
        $depense->commentaires = $inputs['commentaires'];
        $depense->cout = $inputs['cout'];
        $depense->paye = $inputs['paye'];

        $depense->save();

        return $depense;

    }
}
