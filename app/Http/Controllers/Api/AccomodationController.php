<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;


class AccomodationController extends Controller
{

    public function search(Request $request){

        // Prendiamo tutti i dati
        $data = $request->all();
        // Array contente tutte le accomodation filtrate
        $accomodationsFiltered = [];
        // Array per i services
        $accomodationServicesFiltered = [];
        // Array Che riempieremo alla fine con tutti i campi del JSON
        $accomodationsFilteredJSON = [];
         // Prendiamo tutti gli appartamenti secondo i parametri richiesti dall'utente(cha saranno i requisiti minimi)
        $accomodationsToFilter = Accomodation::where("beds", ">=", $data['beds'])
        ->where("toilets", ">=", $data['toilets'])
        ->where("rooms", ">=", $data['rooms'])
        ->where("visible", true)
        ->get();

        if(count($request->services) != 0)
        {
          $requiredServices = count($request->services);
          foreach($accomodationsToFilter as $accomodation)
          {
            $findService = 0;
            foreach($data['services'] as $service)
            {
              foreach($accomodation->services as $accomodation_service)
              {
                if($accomodation_service->id == $service)
                {
                  $findService ++;
                }
              }
            }

            if($findService >= $requiredServices)
            {
              $accomodationServicesFiltered[] = $accomodation;
            }
          }
        }



        foreach ($accomodationServicesFiltered as $accomodation) {
            $distance = $this->distance($accomodation->latitude, $accomodation->longitude, $data['latitude'], $data['longitude']);
            if ($distance<=$data['radius']) {
                $tempAccomodationsFilteredJSON = [
                    'accomodation' => $accomodation,
                    'distance' => $distance,
                    'service' => $accomodation->services,
                    'type' => $accomodation->accomodation_type
                ];

                $accomodationsFilteredJSON[] = $tempAccomodationsFilteredJSON;
            }
        }

        return response()->json($accomodationsFilteredJSON);
    }

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
}
