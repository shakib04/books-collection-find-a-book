<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users = [
        ['id' => 1, 'username' => "shakib", 'password' => 123, 'email' => 's@mail.com'],
        ['id' => 2, 'username' => "joy", 'password' => 123, 'email' => 'joy@mail.com'],
        ['id' => 3, 'username' => "rabbi", 'password' => 123, 'email' => 'rabbi@mail.com'],
    ];

    function __construct()
    {
    }

    public function getAllUsers()
    {
        return view('class_work.home')->with('users', $this->users);
    }

    public function deleteUser($id)
    {
        unset($this->users[$id+1]);
        return view('class_work.home')->with('users', $this->users);
    }

    public function userDetails(Request $req)
    {
        $id = $req->id;
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return view('class_work.user_details_id')->with('user', $user);
            }
        }

        return view('class_work.user_details_id')->with('user', []);
    }
}
