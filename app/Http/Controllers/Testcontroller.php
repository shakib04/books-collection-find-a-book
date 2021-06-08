<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    function HelloFromBangladesh()
    {
        return view("my_welcome");
    }

    function About()
    {
        return view("pages.about");
    }
}
