<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountingsController extends Controller
{
  public function index()
    {
      return view('accounting.index');
    }
}
