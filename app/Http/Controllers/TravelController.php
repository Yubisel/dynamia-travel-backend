<?php

namespace App\Http\Controllers;

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
        return response()->json([], 200);
    }
}
