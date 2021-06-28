<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Session\Session;

class PurchaseController extends Controller
{
    public function CheckoutPage()
    {
        $id = session('userid');
        $allAddress = DB::table('address')->where('userid', $id)->get();
        $totalAmountToPay = DB::table('books')
            ->join('shopping_cart', 'books.Id', '=', 'shopping_cart.BookId')
            ->where('shopping_cart.UserId', '=', Session('userid'))
            ->sum(DB::raw('shopping_cart.Quantity * books.Price'));
        $data = [
            "allAddress" => $allAddress,
            "totalAmountToPay" => $totalAmountToPay,
        ];
        // return dd($totalAmountToPay);
        return view('Book_Mid_Project.checkout2')->with($data);
    }

    public function MakeOrder(Request $request)
    {
        //validation
        $validated = $request->validate([
            'address' => 'required',
            'payment_method' => 'required'
        ]);



        if ($request->payment_method == "Card") {
            //card info validation
            $validated = $request->validate([
                'Card_Number' => 'required|max:19|min:13',
                'MM/YY' => 'required|max:5|min:5',
                'CVC/CVV' => 'required|max:4|min:3',
                'Card_Holder_Name' => 'required',
                'Card_PIN' => 'required|max:5|min:4',
            ]);
        } elseif ($request->payment_method == "Mobile Banking") {
            //mobile bank info validation
            $validated = $request->validate([
                'which_mobile_bank' => 'required',
                'mobile_bank_number' => 'required|max:14|min:11',
                'Mobile_Banking_PIN' => 'required|max:5|min:4',
            ]);
        }

        //total taka amount in cart 
        $totalAmountToPay = DB::table('books')
            ->join('shopping_cart', 'books.Id', '=', 'shopping_cart.BookId')
            ->where('shopping_cart.UserId', '=', Session('userid'))
            ->sum(DB::raw('shopping_cart.Quantity * books.Price'));
        $userid = $request->session()->get('userid');

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

        $result = DB::table('payments')->insert($paymentDetails);

        if ($result) {
            $orderData = [
                "userid" => $userid,
                "amount" => $totalAmountToPay
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

            return redirect()->route('order_received_confirm');
        }
    }
}
