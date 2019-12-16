<?php

namespace App\Http\Controllers;

use App\Passenger;
use App\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index(Request $request)
    {
        $travels = Travel::all();
        return response()->json($travels, 200);
    }

    public function show(Request $request, $id)
    {
        //find the travel by id in db
        $travel = Travel::find($id);
        return response()->json($travel, 201);
    }

    public function save(Request $request)
    {
        //create the travel in db
        $data = $request->json()->all();
        
        $travel = Travel::create([
            'travel_date' =>  date('Y-m-d', strtotime($data['travel_date'])),
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'cost' =>  $data['cost'],
        ]);
        return response()->json($travel, 201);
    }



    public function update(Request $request, $id)
    {
        //update the travel by id in db
        $travel = Travel::findOrFail($id);
        $travel->update($request->all());
        return response()->json($travel, 200);
    }

    public function delete(Request $request, $id)
    {
        //delete the travel by id in db
        $travel = Travel::find($id);
        if ($travel == null) {
            return response()->json(['error' => 1, 'message' => 'Viaje no encontrado'], 200);
        } else {
            
            $passenger = Passenger::where('travel_id', $travel->id)->first();
            if ($passenger == null){
                $travel->delete();
                return response()->json('Viaje eliminado correctamente', 200);
            }else{
                return response()->json(['error' => 1, 'message' => 'No se puede eliminar el viaje porque tiene pasajeros asociados'], 200);
            }
        }
    }
}
