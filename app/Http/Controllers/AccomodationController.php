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
        // Size dei tre array($sponsoredAccomodations,$normalAccomodationsScroll1,$normalAccomodationsScroll2 )
        $sponsoredAccomodationNumber = 10;
        $normalAccomodationNumber = 20;


        // Prendiamo tutti i record da accomodation
        $Accomodations = Accomodation::inRandomOrder()->get();
        // Array contenente tutti i record di type
        $types = AccomodationType::all();

        //Array che conterrà solo i record sponsorizzati di $Accomodations(contiene tutti i record della tabella accomodation)
        $sponsoredAccomodations = [];

        // Array di appartamenti non sponsorizzati
        $normalAccomodationsScroll1 = [];
        $normalAccomodationsScroll2 = [];
        //Cicliamo per ogni record presente all'interno di $Accomodations
        foreach($Accomodations as $accomodation)
        {
          $stop = $Accomodations[count($Accomodations)-1];
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
            }
            if(count($normalAccomodationsScroll1) == $normalAccomodationNumber &&
               count($normalAccomodationsScroll2) == $normalAccomodationNumber &&
               count($sponsoredAccomodations) == $sponsoredAccomodationNumber)
            {
              // Se abbiamo riempito tutti gli array si ritorna la view della home per non ciclare inutilmente
              return view('TEST.home',compact('types','sponsoredAccomodations','normalAccomodationsScroll1','normalAccomodationsScroll2'));
            }
          }
        // Chiamiamo la view della home
        return view('TEST.home',compact('types','sponsoredAccomodations','normalAccomodationsScroll1','normalAccomodationsScroll2'));
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
