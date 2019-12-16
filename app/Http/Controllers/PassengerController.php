<?php

namespace App\Http\Controllers;

use App\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index(Request $request)
    {
        $passengers = Passenger::all();
        return response()->json($passengers, 200);
    }

    public function show(Request $request, $id)
    {
        //find the passenger by id in db
        $passenger = Passenger::find($id);
        return response()->json($passenger, 201);
    }

    public function save(Request $request)
    {
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
    }



    public function update(Request $request, $id)
    {
        //update the passenger by id in db
        $passenger = Passenger::findOrFail($id);
        $passenger->update($request->all());
        return response()->json($passenger, 200);
    }

    public function delete(Request $request, $id)
    {
        //delete the passenger by id in db
        Passenger::findOrFail($id)->delete();
        return response()->json('Pasajero eliminado de forma satisfactoria', 200);
    }
}
