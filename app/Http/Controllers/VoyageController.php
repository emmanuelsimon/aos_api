<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Http\Request;
use Auth;

class VoyageController extends Controller
{
    public function index(Request $request) {
        //dd($request->user('api'));
        $voyages =  Voyage::all();

        return response()->json([
            'data' => $voyages
        ], 200);
    }

    public function show(Request $request, $id) {
        return Voyage::with('etapes')->where('id', $id)->first();
    }

    /**
     * Revue pour projet famille
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        if(is_null($request->user('api'))){
            return response()->json([], 401);
        }
        $inputs = $request->input();

        if(!isset($inputs['id']) || is_null($inputs['id'])){
            $voyage = New Voyage();
        } else {
            $voyage = Voyage::find($inputs['id']);
        }

        $voyage->title = $inputs['title'];
        $voyage->startDate = $inputs['startDate'];
        $voyage->title = $inputs['shortDescription'];
        $voyage->color = $inputs['color'];

        $voyage->save();

        return response()->json([
            'data' => $voyage
        ], 201);
    }

    public function delete(Request $request, $id) {
        if(is_null($request->user('api'))){
            return response()->json([], 401);
        }
        $voyage = Voyage::find($id);

        $voyage->delete();

        return 204;;
    }

    public function restore(Request $request, $id) {
        $voyage = Voyage::withTrashed()->with('etapes')->find($id);
        $voyage->restore();
        return $voyage;
    }
}
