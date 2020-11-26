<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;
use App\Adv;
use App\AccomodationType;
use Carbon\Carbon;

class AccomodationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD:app/Http/Controllers/UI/AccomodationController.php
       //
=======
      // Size dei tre array($sponsoredAccomodations,$normalAccomodationsScroll1,$normalAccomodationsScroll2 )
        $sponsoredAccomodationNumber = 10;
        $normalAccomodationNumber = 20;

        // Prendiamo tutti i record da accomodation
        $Accomodations = Accomodation::inRandomOrder()->get();
        // Array contenente tutti i record di type
        $types = AccomodationType::all();

        // foreach($Accomodations as $accomodation)
        // {
        //   foreach($accomodation->services as $service)
        //     echo  'appartamento: '.$accomodation->id.'   servizio: '.$service->service_name;
        // }

        // Array che conterrà solo i record sponsorizzati di $Accomodations(contiene tutti i record della tabella accomodation)
        $sponsoredAccomodations = [];

        // Array di appartamenti non sponsorizzati
        $normalAccomodationsScroll1 = [];
        $normalAccomodationsScroll2 = [];



        // Cicliamo per ogni record presente all'interno di $Accomodations
        foreach($Accomodations as $accomodation)
        {
          // Questa flag ci serve per non inserire due volte lo stesso appartamento in $sponsoredAccomodations
          $advFound = false;

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
              // Cicliamo per un numero di volte pari al numero delle sponsorizzazioni fatte per quel appartamento
              foreach ($accomodation->advs as $adv)
              {
                // Controlliamo che l'array degli appartamenti sponsorizzati abbia raggiunto il numero di elementi prestabilito in $sponsoredAccomodationNumber
                if(count($sponsoredAccomodations) == $sponsoredAccomodationNumber)
                {
                  break;
                }
                // Controlliamo che la data di fine sponsorizzazione sia maggiore di quella odierna
                if($advFound == false && $adv->pivot->end_adv > Carbon::now())
                {
                  // Se si entra si aggiunge tutto il record a $sponsoredAccomodations
                  $sponsoredAccomodations[] = $accomodation;
                  // Settiamo la flag a true in modo da non inserire più volte lo stesso appartamento
                  $advFound = true;
                  // inseriamo il break per far terminare il ciclo perchè abbiamo trovato una sponsorizzata attiva
                  break;
                }
              }
            }
        }



        return view('UI.home',compact('types','sponsoredAccomodations','normalAccomodationsScroll1','normalAccomodationsScroll2'));
>>>>>>> back-end-branch:app/Http/Controllers/AccomodationController.php
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
    public function show($id)
    {
        //
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
}
