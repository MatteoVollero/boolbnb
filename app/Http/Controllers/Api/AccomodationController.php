<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;



class AccomodationController extends Controller
{
    public function search(Request $request){

        $accomodations = Accomodation::where("city",$request['city'])
        ->where("beds", ">=", $request['beds'])
        ->where("toilets", $request['toilets'])
        ->get();

        // $accomodations = Accomodation::where("type_id",$request['type_id'])
        // ->get();

        return response()->json($accomodations);
    }
}
