<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;



class AccomodationController extends Controller
{
    public function search(Request $request){

        $accomodations = Accomodation::where("beds", ">=", $request['beds'])
        ->where("toilets", ">=", $request['toilets'])
        ->get();

        return response()->json($accomodations);
    }
}
