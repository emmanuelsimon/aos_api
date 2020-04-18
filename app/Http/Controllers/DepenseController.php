<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function index() {
        return Depense::orderBy('date_activite')->get();
    }

    public function show($id) {
        $depense = Depense::with('CategorieDepense')
            ->where('id', $id)->first();

        return $depense;
    }

    public function store(Request $request) {
        $inputs = $request->input();
        if(isset($inputs['id']) || is_null($inputs['id'])) {
            $depense = new Depense();
        } else {
            $depense = Depense::find($inputs['id']);
        }
        $depense->libelle = $inputs['libelle'];
        $depense->etape_id = $inputs['etape'];
        $depense->categorie_depenses_id = $inputs['category'];
        $depense->observation = $inputs['observation'];
        $depense->commentaires = $inputs['commentaires'];
        $depense->cout = $inputs['cout'];
        $depense->paye = $inputs['paye'];
        $depense->is_ok = $inputs['is_ok'];
        $depense->date_activite = $inputs['date_activite'];

        $depense->save();

        return $depense;

    }

    public function update(Request $request, $id) {
        $depense = $this->store($request);

        return $depense;
    }
}
