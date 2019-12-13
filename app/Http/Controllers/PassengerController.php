<?php

namespace App\Http\Controllers;

use App\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isJson()) {
            $passengers = Passenger::all();
            return response()->json($passengers, 200);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }

    public function show(Request $request, $id)
    {
        if ($request->isJson()) {
            //find the passenger by id in db
            $passenger = Passenger::find($id);
            return response()->json($passenger, 201);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }

    public function save(Request $request)
    {
        if ($request->isJson()) {
            //create the passenger in db
            $this->validate($request, [
                'email' => 'required|email|unique:passengers'
            ]);

            $data = $request->json()->all();
            $passenger = Passenger::create([
                'ci' =>  $data['ci'],
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' =>  $data['phone'],
                'travel_id' =>  $data['travel_id'],
            ]);
            return response()->json($passenger, 201);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }



    public function update(Request $request, $id)
    {
        if ($request->isJson()) {
            //update the passenger by id in db
            $passenger = Passenger::findOrFail($id);
            $passenger->update($request->all());
            return response()->json($passenger, 200);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }

    public function delete(Request $request, $id)
    {
        if ($request->isJson()) {
            //delete the passenger by id in db
            Passenger::findOrFail($id)->delete();
            return response()->json('Deleted successfully', 200);
        } else {
            return response()->json(['error' => 'No esta autorizado'], 401);
        }
    }
}
