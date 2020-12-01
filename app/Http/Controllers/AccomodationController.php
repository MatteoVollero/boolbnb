<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;
use App\Adv;
use App\Service;
use App\AccomodationType;
use App\AccomodationView;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AccomodationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Size dei tre array($sponsoredAccomodations,$normalAccomodationsScroll1,$normalAccomodationsScroll2 )
        $sponsoredAccomodationNumber = 10;
        $normalAccomodationNumber = 20;

        $mostViewed = DB::table('accomodation_views')->selectRaw('accomodation_id, count(accomodation_id)')
                                                     ->groupBy('accomodation_id')
                                                     ->orderBy('count(accomodation_id)','desc')->limit(1)->get();


        $mostViewedAccomodation = Accomodation::find($mostViewed[0]->accomodation_id);

        // Prendiamo tutti i record da accomodation
        $Accomodations = Accomodation::inRandomOrder()->get();

        // Array contenente tutti i record di type
        $types = AccomodationType::all();
        // Array contenente tutti i record di Service
        $services = Service::all();

        //Array che conterrà solo i record sponsorizzati di $Accomodations(contiene tutti i record della tabella accomodation)
        $sponsoredAccomodations = [];

        // Array di appartamenti non sponsorizzati
        $normalAccomodationsScroll1 = [];
        $normalAccomodationsScroll2 = [];
        //Cicliamo per ogni record presente all'interno di $Accomodations
        foreach($Accomodations as $accomodation)
        {
          // Controlliamo quanti elementi ha $accomodation->advs se ne ha 0 è una non sponsorizzata
          if(count($accomodation->advs) == 0)
          {
            // Controlliamo che il numero degli elementi  dell'array della scroll numero 1 sia inferiore a quello stabilito
            if(count($normalAccomodationsScroll1) < $normalAccomodationNumber)
            {
              $normalAccomodationsScroll1[] = $accomodation;
              // Controlliamo che il numero degli elementi  dell'array della scroll numero 2 sia inferiore a quello stabilito
            } else if(count($normalAccomodationsScroll2) < $normalAccomodationNumber)
              {
                $normalAccomodationsScroll2[] = $accomodation;
              }
            } else
            {
              // Controlliamo che il numero delle sponsorizzate non superi quello richiesto
              if(count($sponsoredAccomodations) < $sponsoredAccomodationNumber)
              {
                // Controlliamo se l'ultima sponsorizzazione attivata dall'utente è ancora valida
                 if($accomodation->advs[count($accomodation->advs)-1]->pivot->end_adv > Carbon::now())
                 {
                    $sponsoredAccomodations[] = $accomodation;
                 }
              }
            if(count($normalAccomodationsScroll1) == $normalAccomodationNumber &&
               count($normalAccomodationsScroll2) == $normalAccomodationNumber &&
               count($sponsoredAccomodations) == $sponsoredAccomodationNumber)
            {
              // Se abbiamo riempito tutti gli array si ritorna la view della home per non ciclare inutilmente
              return view('UI.Accomodations.home',compact('mostViewedAccomodation','services','types','sponsoredAccomodations','normalAccomodationsScroll1','normalAccomodationsScroll2'));
            }
          }
      }
      // Chiamiamo la view della home
      return view('UI.Accomodations.home',compact('mostViewedAccomodation','services','types','sponsoredAccomodations','normalAccomodationsScroll1','normalAccomodationsScroll2'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $accomodation = Accomodation::where('slug', $slug)->first();
/*
****************************************************************************************************************
+
+
+                ESEMPIO PER L'ACCESSO
+
+                  *********** URL IMMAGINI DETTAGLIO ***********
+                  foreach ($accomodation->accomodation_images as $accomodationImage){
+                     $accomodationImage->nome_del_campo;
+                  }
+
+                  *********** SERVICES ***********
+                  foreach ($accomodation->services as $service){
+                     $service->nome_del_campo;
+                  }
+
+                  *********** TYPE ***********
+                  $accomodation->accomodation_type->name  Si accede al nome
+
+              PER ACCEDERE ALLE ALTRE PROPRIETA BASTA SCRIVERE ALL'INTERNO DI UN CICLO FOREACH QUESTO:
+                  $accomodationImage->nome_del_campo
+
****************************************************************************************************************
*/
        return view('UI.Accomodations.show', compact('accomodation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

     public function search(Request $request)
     {
       // Prendiamo tutti i dati
       $types = AccomodationType:: all();
       $services = Service::all();
       $data = $request->all();
       // Array contente tutte le accomodation filtrate
       $accomodationsFiltered = [];

       // Array che conterrà le distanze da ordinare
       $distances = [];

      // Array di accomodation ordinate per distanza dalla piu vicina alla piu lontana dal punto di ricerca
       $accomodationsFilteredAsc = [];

       // Array per i services
       $accomodationServicesFiltered = [];

        // Prendiamo tutti gli appartamenti secondo i parametri richiesti dall'utente(cha saranno i requisiti minimi)
       $accomodationsToFilter = Accomodation::where("beds", ">=", $data['beds'])
       ->where("toilets", ">=", $data['toilets'])
       ->where("rooms", ">=", $data['rooms'])
       ->where("visible", true)
       ->get();
        // Controlliamo che ci siano dei servizi richiesti
       if(count($request->services) != 0)
       {
         // Utilizziamo questa variabile come parametro di misura dei servizi da trovare,per decidere di inserire nell'array $accomodationServicesFiltered[]
         $requiredServices = count($request->services);
         foreach($accomodationsToFilter as $accomodation)
         {
           // Flag inizialmente settata a zero
           $findService = 0;
           // Cicliamo i servizi che ci sono stati passati da request
           foreach($data['services'] as $service)
           {
             // Cicliamo sui i servizi di $accomodation
             foreach($accomodation->services as $accomodation_service)
             {
               // Se troviamo un servizio uguale a quello richiesto dall'utente
               if($accomodation_service->service_name == $service)
               {
                 // Incrementiamo la flag
                 $findService ++;
                }
              }
            }
            // Se il numero presente all'inerno della flag è >= dei servizi richiesti($requiredServices) allora lo inseriamo negli appartamenti da considerare
            if($findService >= $requiredServices)
            {
              $accomodationServicesFiltered[] = $accomodation;
            }
          }
        }

      // Cicliamo su $accomodationServicesFiltered per calcolare le distanze
      foreach ($accomodationServicesFiltered as $accomodation) {
          // Calcoliamo la distanza
          $distance = $this->distance($accomodation->latitude, $accomodation->longitude, $data['latitude'], $data['longitude']);
          // La distanza di default la prima volta sarà 20
          if ($distance<=6000) {
            $distance = round($distance,1);
              // Inseriamo tutti con distanza opportuna
              $tempAccomodationsFiltered = [
                  'accomodation' => $accomodation,
                  'distance' => $distance,
                  'services' => $accomodation->services,
                  'type' => $accomodation->accomodation_type
              ];
              $distances[] = $distance;
              // Inseriamo nell'array finale
              $accomodationsFiltered[] = $tempAccomodationsFiltered;
          }
        }

        // Ordiniamo in base alla distanza
        asort($distances);


        // Cicliamo sull'array delee distanze
        foreach ($distances as $key => $value) {
          // Inseriamo il relativo valore in maniera crescente all'interno di $accomodationsFilteredAsc
          $accomodationsFilteredAsc[] = $accomodationsFiltered[$key];
        }

        // Assegnamo l'array ordinato ad $accomodationsFiltered
        $accomodationsFiltered = $accomodationsFilteredAsc;


         return view('UI.Accomodations.search',compact('types', 'services', 'accomodationsFiltered'));
     }

}
