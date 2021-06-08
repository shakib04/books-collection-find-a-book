<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('login.loginPage');
    }

    public function verify(Request $request)
    {

        if ($request->email == $_POST['password']) {
            echo "Matched";
            return redirect('/');
        } else {
            echo "Differ";
        }
    }

    public function valueSend()
    {
        $id = 1001;
        $name = 'Joy';
        //return view('nav')->with('id', 2002);
        //return view('nav')->withName('Bangladesh')
                         // ->withId($id);
        return view('nav',compact('id', 'name'));
    }
}
