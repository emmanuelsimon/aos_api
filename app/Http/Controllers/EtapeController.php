<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use App\Models\Voyage;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class EtapeController extends Controller
{
    public function index() {
        $etapes = Etape::with('voyage')->get()->makeHidden('voyage');

        return response()->json([
            'data' => $etapes
        ], 200);
    }

    public function etapesByVoyageId($id) {
        $voyages = Voyage::find($id);
        $etapes = [];
        if(!is_null($voyages)) {
            $etapes = Etape::orderBy('date_debut')->where('voyage_id', '=', $id)->get();
        }

        return $etapes;
    }

    public function show($id) {
        $etape = Etape::with(['Depenses' => function($query){
            $query->with('CategorieDepense');
        }])->where('id', $id)->first();

        return $etape;
    }

    public function store(Request $request) {
        if(is_null($request->user('api'))){
            return response()->json([], 401);
        }
        $inputs = $request->input();
        if(!isset($inputs['id']) || is_null($inputs['id'])){
            $etape = New Etape();
        } else {
            $etape = Etape::find($inputs['id']);
        }

        $etape->name = $inputs['name'];
        $etape->title = $inputs['title'];
        $etape->lat = $inputs['lat'];
        $etape->long = $inputs['long'];
        $etape->duree = $inputs['duree'];
        $etape->dateEtape = $inputs['dateEtape'];
        $etape->voyage_id = $inputs['voyage_id'];
        $etape->shortDescription = $inputs['shortDescription'];
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
