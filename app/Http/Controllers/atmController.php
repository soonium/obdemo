<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class atmController extends Controller
{
    //



    /**
     * Show the atms.
     *
     * @param  int  $id
     * @return Response
     */

    public function show()
    {
      $json = json_decode(file_get_contents("https://atlas.api.barclays/open-banking/v1.3/atms"),true);
      Log::info('TotalResults: '.$json['meta']['TotalResults']);
      Log::info('Data Array Size: '.sizeof($json['data']));

      foreach ($json['data'] as $atmRecord){
        // Create info pane string

        $info = "<b>Address</b><br/>";
        if (isset($atmRecord['Address']['BuildingNumberOrName'])) $info = $info . $atmRecord['Address']['BuildingNumberOrName'] . ", ";
        if (isset($atmRecord['Address']['StreetName'])) $info = $info . $atmRecord['Address']['StreetName'] . "<br/>";
        if (isset($atmRecord['Address']['TownName'])) $info = $info . $atmRecord['Address']['TownName'] . "<br/>";
        if (isset($atmRecord['Address']['PostCode'])) $info = $info . $atmRecord['Address']['PostCode'] . "<br/><br/>";

        $info = $info . "<b>Services</b><br/>";

        $ser = "";
        foreach ($atmRecord['ATMServices'] as  $service){
          $ser = $ser . $service . ', ';
        }

        $info = $info . rtrim($ser,", ") . ".<br/>";

        $atmArr[] = array($atmRecord['ATMID'] , $atmRecord['GeographicLocation']['Latitude'] , $atmRecord['GeographicLocation']['Longitude'], $info);
      }


      return view('atm',['count' => $json['meta']['TotalResults'], 'locations' => json_encode($atmArr, JSON_NUMERIC_CHECK ) ]);
    }
}
