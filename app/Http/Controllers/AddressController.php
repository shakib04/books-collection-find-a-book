<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Session\Session;

class AddressController extends Controller
{
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

        $totalAddress = DB::table('address')->where('UserId', Session('userid'))->count();
        if ($totalAddress >= 3) {
            return "<h2>Maximum 3 Address is Allowed</h2>";
        }

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
            "UserId" => $request->session()->get('userid'),
            'House_No' => $request->House_No,
            'Road_No' => $request->Road_No,
            'Postal_Code' => $request->Postal_Code,
            'Area' => $request->Area,
            'City' => $request->City,
            'Country' => $request->Country,
            'Mobile_Number' => $request->Mobile_Number
        ];

        $result = DB::table('address')->insert($data);
        return ($result) ?  redirect()->route('MyAddress') : '<h2>Failed to create</h2>';

        //delete address
    }

    public function DeleteAddress($id)
    {
        return "Delete <a href='/user/confDelete/address/" . $id . "'>Confirm</a>";
    }

    public function ConfirmDelete($id)
    {
        $result = DB::table('address')->where('address_id', '=', $id)->delete();
        return ($result) ?  redirect()->route('MyAddress') : '<h2>Failed to delete</h2>';
    }
}
