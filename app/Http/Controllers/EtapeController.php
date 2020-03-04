<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use Illuminate\Http\Request;

class EtapeController extends Controller
{
    public function index() {
        return Etape::all();
    }

    public function show($id) {
        $etape = Etape::with('depenses')->where('id', $id)->first();

        return $etape;
    }

    public function store(Request $request) {
        $inputs = $request->input();
        $etape = New Etape();
        $etape->description = $inputs['description'];
        $etape->lat = $inputs['lat'];
        $etape->long = $inputs['long'];
        $etape->save();

        return $etape;
    }
}
