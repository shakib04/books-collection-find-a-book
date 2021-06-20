<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('login.loginPage');
    }

    public function verify(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|max:10',
            'password' => 'required',
        ]);

        if ($request->email == $_POST['password']) {
            $request->session()->put('email', $request->email);
            if (strtolower($request->email) == "admin") {
                $request->session()->put('type', 'admin');
                return redirect("/admin/Dashboard");
            } else {
                $request->session()->put('type', 'user');
                return redirect("/user/home");
            }
            //return ret('/home');
        } else {
            $request->session()->flash('failed', 'Invalid id or pass');
            return redirect('/login');
        }
    }

    public function valueSend()
    {
        $id = 1001;
        $name = 'Joy';
        //return view('nav')->with('id', 2002);
        //return view('nav')->withName('Bangladesh')
        // ->withId($id);
        return view('nav', compact('id', 'name'));
    }


    public function BookProjectUserLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $result = DB::table('users')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($result) {
            $id = $result->id;
            $name = $result->name;
            $request->session()->put('userid', $id);
            $request->session()->put('userFullName', $name);
            //session(['userid' => $id]);
            //return print_r($result->id);
            return redirect('/user/myaccount');
        } else {
            $request->session()->flash('errorMsg', 'Invalid username or password!');
            return redirect('/book/user/login');
        }
    }
}
