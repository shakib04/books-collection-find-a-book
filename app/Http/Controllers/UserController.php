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
        //return [];
        return $this->users;
        //return view('class_work.home')->with('users', $this->users);
    }

    public function insertNewUser(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/my_json_files/userInfo.json'));
        $json_arr = json_decode($jsonString, true);

        //$json_arr = $json_arr['users'];

        array_push($json_arr['users'], array('id' => (int)rand(100, 1000000), 'username' => $request->username, 'email' => $request->email, 'password' => $request->password));

        $newJsonString = json_encode($json_arr);
        file_put_contents(base_path('resources/my_json_files/userInfo.json'), $newJsonString);

        return $newJsonString;
        //return view('class_work.home')->with('users', $this->users);
    }

    public function deleteUser($id)
    {
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return view('class_work.confirm_delete')->with('user', $user);
            }
        }
    }

    public function confDeleteUser($id)
    {
        foreach ($this->users as $key => $user) {
            if ($user['id'] == $id) {

                unset($this->users[$key]);

                $ar = array(
                    "users" => $this->users
                );

                $newJsonString = json_encode($ar);
                file_put_contents(base_path('resources/my_json_files/userInfo.json'), $newJsonString);
                return $this->users;
            }
        }
    }

    public function userDetails(Request $req, $id)
    {
        //$id = $req->id;
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return json_encode($user);
                //return view('class_work.user_details_id')->with('user', $user);
            }
        }

        return json_encode([]);
        //return view('class_work.user_details_id')->with('user', []);
    }

    public function updateUserDetails(Request $request, $id)
    {

        foreach ($this->users as $key => $user) {
            if ($user['id'] == $id) {
                $user['username'] = $request->username;
                $user['email'] = $request->email;
                $user['password'] = $request->password;

                $this->users[$key] = $user;

                $ar = array(
                    "users" => $this->users
                );

                $newJsonString = json_encode($ar);
                file_put_contents(base_path('resources/my_json_files/userInfo.json'), $newJsonString);
                return $this->users[$key];
            }
        }
    }

    public function UserRegistration(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:25',
            'email' => 'required|unique:users|max:30',
            'password' => 'required|max:32|min:5|confirmed',
            'phone_number' => 'required|max:32|min:5',
            'gender' => 'required|'

        ]);

        $result = DB::table('users')->insert([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'user_type' => "3"
        ]);

        if ($result) {
            return "User Registration Complete. <a href='/book/user/login'>Login Here</a>";
        } else {
            return "Failed to register";
        }
    }


    public function MyAccount()
    {
        $id = session('userid');
        $user = DB::table('users')->where('id', $id)->first();
        $allAddress = DB::table('address')->where('userid', $id)->get();
        $data = [
            'userDetials' => $user,
            'allAddress' => $allAddress
        ];
        return view('Book_Mid_Project.my_account.dashboard')->with($data);
        //return dd($data);
    }

    public function Account_Details()
    {
        $id = session('userid');
        $user = DB::table('users')->where('id', $id)->first();
        $allAddress = DB::table('address')->where('userid', $id)->get();
        $data = [
            'userDetials' => $user,
            'allAddress' => $allAddress
        ];

        return view('Book_Mid_Project.my_account.account_details')->with($data);
    }


    public function ChangeProfiePicture(Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            // echo "file name: ".$file->getClientOriginalName()."<br>";
            // echo "file extension: ".$file->getClientOriginalExtension()."<br>";
            // echo "file Mime Type: ".$file->getType()."<br>";
            // echo "file Size: ".$file->getSize();

            $fileName = $request->session()->get('userid') . time() . "." . $file->getClientOriginalExtension();
            if ($file->move('upload/users/profile_pic', $fileName)) {
                echo "success";
            } else {
                echo "error..";
            }
        } else {
            return "file not found! ";
        }

        $result = DB::table('users')
            ->where('id', $request->session()->get('userid'))
            ->update(['profile_pic' => $fileName]);

        if ($result) {
            return redirect("/user/myaccount");
        } else {
            return "Failed to Upload";
        }
    }


    public function EditProfile(Request $request)
    {

        $id = session('userid');
        DB::table('users')
            ->where('id', $id)
            ->update(['name' => $request->name, 'gender' => $request->gender]);
        $request->session()->put('userFullName', $request->name);
        return redirect()->route('account_details');
    }

    public function ChangePassword(Request $request)
    {
        $validated = $request->validate([
            'Current_Password' => 'required|min:5|max:32',
            'New_Password' => 'required|confirmed|min:5|max:32'
        ]);

        $id = session('userid');

        $result =  DB::table('users')
            ->where([['id', '=', $id], ['password', '=', $request->Current_Password]])
            ->first();

        //flash message
        if ($result) {
            DB::table('users')
                ->where('id', $id)
                ->update(['password' => $request->New_Password]);
            return redirect()->route('account_details');
        } else {
            return "<h2>Old Password is incorrect</h2>";
        }
    }

    

    public function AllShippingAddress()
    {
        $userid = session('userid');
        $allAddress = DB::table('address')->where([['userid', '=', $userid]]);
        return view('Book_Mid_Project.my-account')->with('allAddress', $allAddress);
    }
}
