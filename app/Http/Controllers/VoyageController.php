<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Http\Request;

class VoyageController extends Controller
{
    public function index() {
        return Voyage::with('etapes')->get();
    }

    public function show(Request $request, $id) {
        return Voyage::with('etapes')->where('id', $id)->first();
    }

    public function store(Request $request) {
        $inputs = $request->input();

        if(!isset($inputs['id']) || is_null($inputs['id'])){
            $voyage = New Voyage();
        } else {
            $voyage = Voyage::find($inputs['id']);
        }

        $voyage->title = $inputs['title'];
        $voyage->date_debut = $inputs['date_debut'];

        $voyage->save();

        return $voyage;
    }

    public function delete(Request $request, $id) {
        $voyage = Voyage::with('etapes')->find($id);
        $voyage->delete();

        return 204;;
    }

    public function restore(Request $request, $id) {
        $voyage = Voyage::withTrashed()->with('etapes')->find($id);
        $voyage->restore();
        return $voyage;
    }
}
