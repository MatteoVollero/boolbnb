<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accomodation;
use App\Adv;
use App\AccomodationType;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      dd("HomeController");
      return ;
    }

}
