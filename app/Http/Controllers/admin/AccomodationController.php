<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;
use App\AccomodationType;
use App\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AccomodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Inseriamo in questo array tutti gli appartamenti di proprietà dello user loggato
      $accomodationsUpra = Accomodation::where('user_id',Auth::id())->get();
      // Controlliamo che $accomodationsUpra contenga effettivamente qualcosa
      if(count($accomodationsUpra) == 0)
      {
        $accomodationsUpra = 'No accomodation for this user';
      }

      return view('UPRA.Accomodations.index',compact('accomodationsUpra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Recuperiamo tutti i services dal DB
        $services = Service::all();
        // Recuperiamo tutti gli accomodation_types dal DB
        $types = AccomodationType::all();
        // Chiamiamo la view contenente il form di creazione dell'accomodation
        return view('TEST.create', compact('services', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Trasferiamo in $data tutto i dati che sono stati inseriti all'interno del form
        $data = $request->all();

        // Validazione dei dati ricevuti dal form con $request
        $request->validate ([
          'title'=>'required|max:300',
          'description'=>'required|max:800',
          'cover_image'=>'required|image',
          'slug'=>'required|unique:accomodations,slug|max:300',
          'country'=>'required|max:100',
          'region'=>'required|max:100',
          'city'=>'required|max:100',
          'address'=>'required|max:100',
          'zip_code'=>'required|max:15',
          'beds'=>'required|integer|min:0|max:100',
          'rooms'=>'required|integer|min:0|max:100',
          'toilets'=>'required|integer|min:0',
          'square_meters'=>'required|integer|min:9|max:1200',
          'price'=>'required|between:0,9999.99',
          'latitude'=>'required|between:-90,90.01',
          'longitude'=>'required|between:-180.00,180.00',
          'visible'=>'required|between:0,1',
          'type_id'=>'required|integer|min:0',
      ]);

      // Creiamo una nuova istanza di accomodations
      $newAccomodation=new Accomodation;
      // Riempiamo tutti i campi del nuovo record della tabella accomodations
      $newAccomodation->user_id = $data['user_id'];
      $newAccomodation->title = $data['title'];
      $newAccomodation->description = $data['description'];
      $newAccomodation->cover_image = $data['cover_image'];
      $newAccomodation->slug = $data['slug'];
      $newAccomodation->country = $data['country'];
      $newAccomodation->region = $data['region'];
      $newAccomodation->city = $data['city'];
      $newAccomodation->address = $data['address'];
      $newAccomodation->zip_code = $data['zip_code'];
      $newAccomodation->beds = $data['beds'];
      $newAccomodation->rooms = $data['rooms'];
      $newAccomodation->toilets = $data['toilets'];
      $newAccomodation->square_meters = $data['square_meters'];
      $newAccomodation->price = $data['price'];
      $newAccomodation->latitude = $data['latitude'];
      $newAccomodation->longitude = $data['longitude'];
      $newAccomodation->visible = $data['visible'];
      $newAccomodation->type_id = $data['type_id'];
      // Salviamo il nuovo record nella tabella accomodations
      $newAccomodation->save();
      // Prendiamo dalla tabella accomodations l'ultimo record appena inserito per recuperare l'id
      $newAccomodation = Accomodation::all()->last();

      // Cicliamo su tutti i servizi che hai scelto l'utente
      // foreach ($data['services'] as $service) {
      foreach ($request->services as $service) {
        // salva con attach nella tabella pivot accomodation_service gli id di services scelti dell'utente
        $newAccomodation->services()->attach($service);
      }
      // Reindirizziamo alla route che visualizza la view show dell'accomodation appena inserito
      return redirect()->route('admin.accomodations.show', $newAccomodation->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      // Troviamo in accomodations il record che ha slug uguale a quello passato in argomento
      $accomodation = Accomodation::where('slug', $slug)->get();
      // Chiamiamo la view show dell'UPRA, passandogli  compact il record trovato
      return view('TEST.show', compact('accomodation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $accomodation = Accomodation::find($id);
      $services= Service::all();
      $serviceChecked='';

      return view('TEST.edit', compact('accomodation', 'services', 'serviceChecked'));
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
      // Trasferiamo in $data tutto i dati che sono stati inseriti all'interno del form
      $data = $request->all();

      // Validazione dei dati ricevuti dal form con $request
      $request->validate ([
        'title'=>'required|max:300',
        'description'=>'required|max:800',
        'cover_image'=>'required|image',
        'slug'=>[
          'required',
          'max:300',
          'unique:accomodations,slug,'.$id
        ],
        'country'=>'required|max:100',
        'region'=>'required|max:100',
        'city'=>'required|max:100',
        'address'=>'required|max:100',
        'zip_code'=>'required|max:15',
        'beds'=>'required|integer|min:0|max:100',
        'rooms'=>'required|integer|min:0|max:100',
        'toilets'=>'required|integer|min:0',
        'square_meters'=>'required|integer|min:9|max:1200',
        'price'=>'required|between:0,9999.99',
        'latitude'=>'required|between:-90.00,90.00',
        'longitude'=>'required|between:-180.00,180.00',
        'visible'=>'required|between:0,1',
        'type_id'=>'required|integer|min:0',
    ]);

      $editAccomodation = Accomodation::find($id);

      // Riempiamo tutti i campi del nuovo record della tabella accomodations
      $editAccomodation->user_id = $data['user_id'];
      $editAccomodation->title = $data['title'];
      $editAccomodation->description = $data['description'];
      $editAccomodation->cover_image = $data['cover_image'];
      $editAccomodation->slug = $data['slug'];
      $editAccomodation->country = $data['country'];
      $editAccomodation->region = $data['region'];
      $editAccomodation->city = $data['city'];
      $editAccomodation->address = $data['address'];
      $editAccomodation->zip_code = $data['zip_code'];
      $editAccomodation->beds = $data['beds'];
      $editAccomodation->rooms = $data['rooms'];
      $editAccomodation->toilets = $data['toilets'];
      $editAccomodation->square_meters = $data['square_meters'];
      $editAccomodation->price = $data['price'];
      $editAccomodation->latitude = $data['latitude'];
      $editAccomodation->longitude = $data['longitude'];
      $editAccomodation->visible = $data['visible'];
      $editAccomodation->type_id = $data['type_id'];

      // Salviamo il nuovo record nella tabella accomodations
      $editAccomodation->save();

      // Cicliamo su tutti i servizi dell'accomodation e li cancelliamo
      foreach ($editAccomodation->services as $service) {
        $editAccomodation->services()->detach($service);
      }

      // Cicliamo su tutti i servizi che ha scelto l'utente
      foreach ($request->services as $service) {
        // salva con attach nella tabella pivot accomodation_service gli id di services scelti dell'utente
        $editAccomodation->services()->attach($service);
      }

      // Reindirizziamo alla route che visualizza la view show dell'accomodation appena inserito
      return redirect()->route('admin.accomodations.show', $editAccomodation->slug);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Troviamo in accomodations il record con l'id passato come argomento $id
        $accomodation = Accomodation::find($id);
        // Cancelliamo dal DB il record trovato
        $accomodation->delete();
        // Reindirizziamo alla route che visualizza la view home
        return redirect()->route('admin.accomodations.index');
    }
}
