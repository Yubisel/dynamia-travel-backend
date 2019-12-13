<?php

namespace App\Http\Controllers;
use App\Travel;

class TravelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function index(){
        $travels = Travel::all();
        return response()->json($travels, 200);
    }
}
