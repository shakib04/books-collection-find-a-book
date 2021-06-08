<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CricbuzzController extends Controller
{
    public function home()
    {
        return view('cricbuzz.home');
    }
}
