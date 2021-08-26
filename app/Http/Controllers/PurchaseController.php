<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PurchaseController extends Controller
{
    public function CheckoutPage(Request $request)
    {
        //$id = session('userid');
        $id = $request->userid;
        $allAddress = DB::table('address')->where('userid', $id)->get();
        $totalAmountToPay = DB::table('books')
            ->join('shopping_cart', 'books.Id', '=', 'shopping_cart.BookId')
            ->where('shopping_cart.UserId', '=', Session('userid'))
            ->sum(DB::raw('shopping_cart.Quantity * books.Price'));
        $data = [
            "allAddress" => $allAddress,
            "totalAmountToPay" => $totalAmountToPay,
        ];
        return json_encode($data);
        // return dd($totalAmountToPay);
        return view('Book_Mid_Project.checkout2')->with($data);
    }

    public function GetOrderById($id, Request $request)
    {
        $userid = $request->userid;

        $orderDetails = DB::table('orders')
            ->join('payments', 'orders.payment_id', '=', 'payments.payment_id')
            ->join('address', 'address.address_id', '=', 'payments.address_id')
            ->where([['orders.userid', '=', $userid], ['orders.order_id', '=', $id]])
            ->first();

        $orderItems = DB::table('order_items')
            ->join('books', 'books.Id', '=', 'order_items.book_id')
            ->where('order_id',  '=', $orderDetails->order_id)
            ->get();
        //return dd($orderDetails);
        $data = [
            "orderDetails" => $orderDetails,
            "orderItems" => $orderItems,
        ];
        return json_encode($data);
        return view('Book_Mid_Project.order_received')->with($data);
    }

    public function OrderList(Request $request)
    {
        $userid = $request->userid;
        //$orders = DB::table('orders')->where('userid', $request->session()->get('userid'))->get();
        $orders = DB::table('orders')->where('userid', $userid)->get();
        return json_encode($orders);
        return view('Book_Mid_Project.my_account.my_order')->with('orders', $orders);
    }

    public function MakeOrder(Request $request)
    {
        //validation
        // $validated = $request->validate([
        //     'address' => 'required',
        //     'payment_method' => 'required'
        // ]);


        //more validation

        // if ($request->payment_method == "Card") {
        //     //card info validation
        //     $validated = $request->validate([
        //         'Card_Number' => 'required|max:19|min:13',
        //         'MM/YY' => 'required|max:5|min:5',
        //         'CVC/CVV' => 'required|max:4|min:3',
        //         'Card_Holder_Name' => 'required',
        //         'Card_PIN' => 'required|max:5|min:4',
        //     ]);
        // } elseif ($request->payment_method == "Mobile Banking") {
        //     //mobile bank info validation
        //     $validated = $request->validate([
        //         'which_mobile_bank' => 'required',
        //         'mobile_bank_number' => 'required|max:14|min:11',
        //         'Mobile_Banking_PIN' => 'required|max:5|min:4',
        //     ]);
        // }

        //total taka amount in cart 
        $userid = $request->userid;
        $totalAmountToPay = DB::table('books')
            ->join('shopping_cart', 'books.Id', '=', 'shopping_cart.BookId')
            ->where('shopping_cart.UserId', '=', $userid)
            ->sum(DB::raw('shopping_cart.Quantity * books.Price'));
        //$userid = $request->session()->get('userid');

        $paymentDetails = [
            "userid" => $userid,
            "address_id" => $request->address,
            "payment_method" => $request->payment_method,
            "mobile_bank_name" => $request->which_mobile_bank,
            "mobile_number" => $request->mobile_bank_number,
            "card_number" => $request->Card_Number,
            "amount" => $totalAmountToPay
        ];

        //return dd($paymentDetails);

        $paymentId = DB::table('payments')->insertGetId($paymentDetails);

        if (true) {
            $orderData = [
                "userid" => $userid,
                "amount" => $totalAmountToPay,
                "payment_id" => $paymentId
            ];

            $orderId = DB::table('orders')->insertGetId($orderData);
            //return dd($orderId);
            $totalItemInCart = DB::table('shopping_cart')->where('UserId', $userid)->get();
            if ($totalItemInCart) {
                foreach ($totalItemInCart as $item) {
                    $itemData = [
                        "order_id" => $orderId,
                        "book_id" => $item->BookId,
                        "quantity" => $item->Quantity
                    ];
                    DB::table('shopping_cart')->where([['BookId', '=', $item->BookId], ["UserId", "=", $userid]])->delete();
                    DB::table('order_items')->insert($itemData);
                }
            }

            return 1;
            return redirect()->route('order_received_confirm', $orderId);
        }
    }
}
