<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Classes\Constants;
use Exception;

class WeatherController extends Controller
{
  /**
   * Get weather data using REST client from openweathermap.org
   */
  public function getWeather(Request $request)
  {
    try
    {
      $httpClient = new Client(['http_errors' => false]);
      $url = Constants::REST_WEATHER_API_URL . "?q={$request->city},{$request->countryCode}&units=metric&appid=" . Constants::OPEN_WEATHER_API_KEY;
      $response = $httpClient->request('GET', $url);
      if ($response->getStatusCode() == 200)
      {
        $weather = json_decode($response->getBody()->getContents());
        return response()->json($weather, 200);
      }
      $errorMessage = json_decode($response->getBody()->getContents());
      return response()->json($errorMessage, 404);
    }
    catch (Exception $e)
    {
      return response()->json(json_encode($e), 404);
    }
  }
}
