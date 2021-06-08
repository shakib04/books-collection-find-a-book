<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    function myName($val1="", $val2 = "", $val3 = "")
    {
        return view('demoView', ['k1'=> $val1, 'k2' => $val2, 'k3' => $val3]);
    }
}
