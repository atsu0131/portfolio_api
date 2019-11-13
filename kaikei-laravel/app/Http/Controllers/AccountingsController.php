<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      return $api;
    }

    public function getdinnerFromApi()
    {
        $env = config('app.api_key_dinner');
        $url = "https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=".$env."&freeword=";
        $api = $url;
        return $api;
    }
}
