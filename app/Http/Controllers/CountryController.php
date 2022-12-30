<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Classes\Constants;
use Exception;

class CountryController extends Controller
{
    /**
     * Get all the countries using REST client from restcountries.com
     */
    public function getCountries()
    {
        try {
            $httpClient = new Client(['http_errors' => false]);
            $response = $httpClient->request('GET', Constants::REST_COUNTRIES_API_URL);
            if ($response->getStatusCode() == 200) {
                $countries = json_decode($response->getBody()->getContents());
                return response()->json($countries, 200);
            }
            return response()->json(null, 404);
        } catch (Exception $e) {
            return response()->json($e, 404);
        }
    }
}
