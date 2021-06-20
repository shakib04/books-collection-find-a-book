<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    private $users;
    // [
    //     ['id' => 1, 'username' => "shakib", 'password' => 123, 'email' => 's@mail.com'],
    //     ['id' => 2, 'username' => "joy", 'password' => 123, 'email' => 'joy@mail.com'],
    //     ['id' => 3, 'username' => "rabbi", 'password' => 123, 'email' => 'rabbi@mail.com'],
    // ];

    function __construct()
    {

        $jsonString = file_get_contents(base_path('resources/my_json_files/userInfo.json'));
        $data = json_decode($jsonString, true);
        $this->users = $data['users'];
    }

    public function UserHome()
    {
        return view('class_work.user');
    }

    public function getAllUsers()
    {
        return view('class_work.home')->with('users', $this->users);
    }

    public function deleteUser($id)
    {
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return view('class_work.confirm_delete')->with('user', $user);
            }
        }
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

    public function confDeleteUser()
    {
    }

    public function UserRegistration(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:25',
            'email' => 'required|unique:users|max:30',
            'password' => 'required|max:32|min:5',
            'phone_number' => 'required|max:32|min:5',
            'gender' => 'required|'

        ]);

        $result = DB::table('users')->insert([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender
        ]);

        if ($result) {
            return "User Registration Complete";
        } else {
            return "Failed to register";
        }
    }


    public function EditProfile(Request $request)
    {
        
    }
}
