<?php

namespace App\Http\Controllers;

use App\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isJson()) {
            $travels = Travel::all();
            return response()->json($travels, 200);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }

    public function show(Request $request, $id)
    {
        if ($request->isJson()) {
            //find the travel by id in db
            $travel = Travel::find($id);
            return response()->json($travel, 201);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }

    public function save(Request $request)
    {
        if ($request->isJson()) {
            //create the travel in db
            $data = $request->json()->all();
            $travel = Travel::create([
                'travel_date' =>  $data['travel_date'],
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'cost' =>  $data['cost'],
            ]);
            return response()->json($travel, 201);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }



    public function update(Request $request, $id)
    {
        if ($request->isJson()) {
            //update the travel by id in db
            $travel = Travel::findOrFail($id);
            $travel->update($request->all());
            return response()->json($travel, 200);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }

    public function delete(Request $request, $id)
    {
        if ($request->isJson()) {
            //delete the travel by id in db
            Travel::findOrFail($id)->delete();
            return response()->json('Deleted successfully', 200);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }
}
