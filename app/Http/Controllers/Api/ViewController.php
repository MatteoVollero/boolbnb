<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\AccomodationView;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    // Funzione per le statistiche
    public function stats(Request $request){

      $data = $request->all();


      $lastWeekStats = DB::table('accomodation_views')->selectRaw('date,accomodation_id,count(*) as views')
                  ->groupBy('date','accomodation_id')
                  ->having('accomodation_id', '=', $data['id'])
                  ->having('date', '>' , Carbon::now()->subDays(7))
                  ->having('date',  '<', Carbon::now())
                  ->orderBy('date')
                  ->get();

      $date = [];
      $views = [];
      $totalViews = 0;

      foreach($lastWeekStats as $stats){
        $tempDate = Carbon::parse($stats->date)->format('d/m/Y');
        $date[] = $tempDate;
        $views[] = $stats->views;
        $totalViews += $stats->views;
      }

      if(count($date) != 7)
      {
        for($i = 0; $i < 6; $i ++)
        {
          if($date[$i] != Carbon::parse(Carbon::now()->subDays(6-$i))->format('d/m/Y'))
          {
            array_splice($date,$i,0,Carbon::parse(Carbon::now()->subDays(6-$i))->format('d/m/Y'));
            array_splice($views,$i,0,0);
          }
        }
      }

      $stats = [
        'date' => $date,
        'views' => $views,
        'viewsTotal' => $totalViews
      ];

        return response()->json($stats);
    }
}
