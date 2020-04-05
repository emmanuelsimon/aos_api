<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use Illuminate\Http\Request;

class EtapeController extends Controller
{
    public function index() {
        return Etape::orderBy('date_debut')->get();
    }

    public function show($id) {
        $etape = Etape::with(['depenses' => function($query){
            $query->with('CategorieDepense');
        }])->where('id', $id)->first();

        return $etape;
    }

    public function store(Request $request) {
        $inputs = $request->input();
        if(!isset($inputs['id']) || is_null($inputs['id'])){
            $etape = New Etape();
        } else {
            $etape = Etape::find($inputs['id']);
        }

        $etape->description = $inputs['description'];
        $etape->lat = $inputs['lat'];
        $etape->long = $inputs['long'];
        $etape->nbr_nuit = $inputs['nbr_nuit'];
        $etape->date_debut = $inputs['date_debut'];
        $etape->save();

        return $etape;
    }

    public function delete(Request $request, $id) {

        $etape = Etape::with('depenses')->find($id);

        $etape->delete();

        return 204;
    }

    public function update(Request $request, $id) {

        $etape = $this->store($request);

        return $etape;
    }
}
