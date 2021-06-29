<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShopController extends Controller
{
    public function ShopById(Request $request, $shopId)
    {
        $shopInfo = DB::table('shop')->where('shop_id', $shopId)->first();
        $userFollow = DB::table('user_shop_subscription')
            ->where([['shopid', $shopId], ['userid', $request->session()->get('userid')]])
            ->first();
        $data = [
            "shopInfo" => $shopInfo,
            "userFollow" => $userFollow
        ];
        return view('Book_Mid_Project.Shop_home')->with($data);
    }

    public function FollowShop(Request $request, $shopId)
    {
        DB::table('user_shop_subscription')->insert(
            [
                'userid' => $request->session()->get('userid'),
                'shopid' => $shopId
            ]
        );

        return redirect('/shop/details/' . $shopId);
    }

    public function UnfollowShop(Request $request, $shopId)
    {
        DB::table('user_shop_subscription')->where(
            [
                ['userid', $request->session()->get('userid')],
                ['shopid', $shopId]
            ]
        )->delete();

        return redirect('/shop/details/' . $shopId);
    }

    public function ContactShop(Request $request, $shopId)
    {

        $validated = $request->validate([
            'subject' => 'required|max:100',
            'message' => 'required|max:1000',
        ]);

        DB::table('contact_form')->insert(
            [
                'sender_id' => $request->session()->get('userid'),
                'receiver_id' => $shopId,
                'subject' => $request->subject,
                'message' => $request->message
            ]
        );

        return redirect('/shop/details/' . $shopId);
    }
}
