<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\pincodeModel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;

class databasesync
{
    //
    public function saveApiData()
    {

        DB::table('pincode')->delete();
        $client = new Client(['base_uri' => 'https://api.data.gov.in/resource/']);

        for ($offset = 0; ; $offset += 1000) {
            try {
                $response = $client->request('GET', "6176ee09-3d56-4a3b-8115-21841576b2f6?api-key=579b464db66ec23bdd000001cbc679d39b264dee67c1231f508f9b39&format=json&offset=$offset&limit=1000");

            } catch (GuzzleException $e) {
                return ("exception thrown");
            }


            $response1 = $response->getBody();

            $response2 = json_decode($response1, true);
            $response3 = $response2['records'];

            if (empty($response3)) {
                break;
            }
            foreach ($response3 as $element) {
                if(empty($response3))
                    break;

                $pincodeModel = new pincodeModel;
                $pincodeModel->pincode = $element['pincode'];
                $pincodeModel->districtname = $element['districtname'];
                $pincodeModel->statename = $element['statename'];
                $pincodeModel->divisionname = $element['divisionname'];
                $pincodeModel->save();
            }
        }

    }
}