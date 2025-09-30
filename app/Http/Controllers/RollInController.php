<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RollInController extends Controller
{
      function __construct()
    {
        $this->middleware('auth');
    }

    function menu()
    {
        return view('roll_in.index');
    }
}
