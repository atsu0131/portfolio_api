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
        $env = env('WEATHER_APP_KEY');
        $url = "https://api.openweathermap.org/data/2.5/weather?q=Tokyo,jp&units=metric&appid=";
        $api = $url.$env;

        $guzzleClient = new Client();
        $res = $guzzleClient->get($api);
        $data = json_decode($res->getBody(),true);
        return $data;
    }

    public function getDinnerFromApi()
    {
        $env = env('DINNER_APP_KEY');
        $url = "https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=".$env."&freeword=焼肉";
        $api = $url;

        $guzzleClient = new Client();
        $res = $guzzleClient->get($api);
        $data = json_decode($res->getBody(),true);
        return $data;
    }
}
