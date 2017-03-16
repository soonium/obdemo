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

      $atmChunk1 = $this->getATMData("https://atlas.api.barclays/open-banking/v1.3/atms","Barclays");
      $atmChunk2 = $this->getATMData("https://openapi.natwest.com/open-banking/v1.2/atms","Natwest");
      $atmChunk3 = $this->getATMData("https://openapi.bankofireland.com/open-banking/v1.2/atms","BankOfIreland");
      $atmChunk4 = $this->getATMData("https://api.santander.co.uk/retail/open-banking/v1.2/atms","Santander");

      $atmList = array_merge ($atmChunk1,$atmChunk2,$atmChunk3,$atmChunk4);

      return view('atm',['locations' => json_encode($atmList, JSON_NUMERIC_CHECK ) ]);
    }

    private function getATMData($url,$bankId){

      $atmArr=array();

      $arrContextOptions=array(
          "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      );

      $json = json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)),true);

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

        $atmArr[] = array($atmRecord['ATMID'] , $atmRecord['GeographicLocation']['Latitude'] , $atmRecord['GeographicLocation']['Longitude'], $info, $bankId);

      }
      return $atmArr;

    }

}
