<?php

namespace App\Http\Controllers\UI;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;
use App\Adv;
use App\Service;
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
        // Prendiamo tutti i record da accomodation
        $Accomodations = Accomodation::all();

        // Array che conterrà solo i record sponsorizzati di $Accomodations(contiene tutti i record della tabella accomodation)
        $sponsoredAccomodations = [];

        // Cicliamo per ogni record presente all'interno di $Accomodations
        foreach($Accomodations as $accomodation){
          // Questa flag ci serve per non inserire due volte lo stesso appartamento in $sponsoredAccomodations
          $advFound = false;
          // Cicliamo per un numero di volte pari al numero delle sponsorizzazioni fatte per quel appartamento
          foreach ($accomodation->advs as $adv) {
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

        dd($sponsoredAccomodations[21]->services[0]->service_name);

        return view('UI.home');
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
