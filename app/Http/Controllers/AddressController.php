<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Session\Session;

class AddressController extends Controller
{


    public function MyAddress(Request $request)
    {
        //$id = session('userid');
        $id = $request->userid;
        $user = DB::table('users')->where('id', $id)->first();
        $allAddress = DB::table('address')->where('userid', $id)->get();
        $data = [
            'userDetials' => $user,
            'allAddress' => $allAddress
        ];
        return response()->json($allAddress);
        return view('Book_Mid_Project.my_account.my_address')->with($data);
    }

    public function CreateAddress(Request $request)
    {

        $totalAddress = DB::table('address')->where('UserId', Session('userid'))->count();
        if ($totalAddress >= 3) {
            return "<h2>Maximum 3 Address is Allowed</h2>";
        }
        return view("Book_Mid_Project.my_account.add_address");
    }

    public function StoreAddress(Request $request)
    {
        //Session('userid')
        //$request->session()->get('userid')
        $userid = $request->userid;

        $totalAddress = DB::table('address')->where('UserId', $userid)->count();
        // if ($totalAddress >= 3) {
        //     return "<h2>Maximum 3 Address is Allowed</h2>";
        // }

        $validated = $request->validate([
            'House_No' => 'required|max:255',
            'Road_No' => 'required',
            'Postal_Code' => 'required',
            'Area' => 'required',
            'City' => 'required',
            'Country' => 'required',
            'Mobile_Number' => 'required'
        ]);

        $data = [
            "UserId" => $userid,
            'House_No' => $request->House_No,
            'Road_No' => $request->Road_No,
            'Postal_Code' => $request->Postal_Code,
            'Area' => $request->Area,
            'City' => $request->City,
            'Country' => $request->Country,
            'Mobile_Number' => $request->Mobile_Number
        ];

        $result = DB::table('address')->insert($data);
        return response()->json($data);
        return ($result) ?  redirect()->route('MyAddress') : '<h2>Failed to create</h2>';

        //delete address
    }

    public function EditAddress($address_id)
    {
        $userid = session('userid');
        $address = DB::table('address')->where([['userid', '=', $userid], ['address_id', '=', $address_id]])->first();
        return view('Book_Mid_Project.edit_address')->with('userAddress', $address);
    }

    public function GetAddressById(Request $request, $address_id)
    {
        $userid = $request->userid;
        $address = DB::table('address')->where([['userid', '=', $userid], ['address_id', '=', $address_id]])->first();
        return json_encode($address);
        return response()->json($address);
    }

    public function UpdateAddress($address_id, Request $request)
    {
        //$userid = session('userid');
        $userid = $request->userid;

        $data = array(
            "House_No" => $request->House_No,
            "Road_No" => $request->Road_No,
            "Postal_Code" => $request->Postal_Code,
            "Area" => $request->Area,
            "City" => $request->City,
            "Country" => $request->Country,
            "Mobile_Number" => $request->Mobile_Number
        );

        $address = DB::table('address')->where([['userid', '=', $userid], ['address_id', '=', $address_id]])->update($data);
        return response()->json($data);
        return redirect('/user/myaccount');
    }

    public function DeleteAddress($id)
    {
        return "Delete <a href='/user/confDelete/address/" . $id . "'>Confirm</a>";
    }

    public function ConfirmDelete($id)
    {
        //scan user id
        $result = DB::table('address')->where('address_id', '=', $id)->delete();
        return response()->json($result);
        return ($result) ?  redirect()->route('MyAddress') : '<h2>Failed to delete</h2>';
    }
}
