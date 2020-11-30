<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;


class AccomodationController extends Controller
{

    public function distance($lat1, $lon1, $lat2, $lon2) { 
        $pi80 = M_PI / 180; 
        $lat1 *= $pi80; 
        $lon1 *= $pi80; 
        $lat2 *= $pi80; 
        $lon2 *= $pi80; 
        $r = 6372.797; // mean radius of Earth in km 
        $dlat = $lat2 - $lat1; 
        $dlon = $lon2 - $lon1; 
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2); 
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
        $km = $r * $c; 
        //echo ' '.$km; 
        return $km; 
    }

    public function search(Request $request){


        $data = $request->all();
      
        $accomodationsFiltered = [];

        $accomodationsToFilter = Accomodation::all();

        foreach ($accomodationsToFilter as $accomodation) {
            $distance = $this->distance($accomodation->latitude, $accomodation->longitude, $data['lat'], $data['lon']);
            if ($distance<=$data['radius']) {
                $accomodationsFiltered [] = $accomodation;
            }
        }

        // $accomodations = Accomodation::where("beds", ">=", $request['beds'])
        // ->where("toilets", ">=", $request['toilets'])
        // ->get();
        return response()->json($accomodationsFiltered);

    }
}


