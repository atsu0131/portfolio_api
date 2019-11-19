<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AccountingsController extends Controller
{
    public function index()
    {
      return view('accounting.index');
    }

    public function getWeatherFromApi()
    {
        $env = config('app.api_key_weather');
        $url = "https://api.openweathermap.org/data/2.5/weather?q=Tokyo,jp&units=metric&appid=";
        $api = $url.$env;

        $guzzleClient = new Client();
        $res = $guzzleClient->get($api);
        $data = json_decode($res->getBody(),true);
        return $data;
    }

    public function getDinnerFromApi(Request $request)
    {
        $searchParam = $request->query('param');

        $env = config('app.api_key_dinner');
        $url = "https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=".$env."&freeword=".$searchParam;
        $api = $url;

        $guzzleClient = new Client();
        $res = $guzzleClient->get($api);
        $data = json_decode($res->getBody(),true);
        return $data;
    }
}
