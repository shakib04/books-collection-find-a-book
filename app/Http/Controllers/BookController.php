<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function getAllBooksForHome()
    {
        $booksOfHome = DB::table('books')->get();
        return view('Book_Mid_Project.index')->with('booksOfHome', $booksOfHome);
    }

    public function getBooksByCatagory($category)
    {
    }

    public function BookById($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        //return dd($book);
        return view('Book_Mid_Project.single_product')->with('book', $book);
    }

    public function AddToCart(Request $request, $id)
    {
        $UserId = $request->session()->get('userid');
        $bookId = $id;
        $NewQuantity = $request->quantity;
        $productInCart = DB::table('shopping_cart')->where([
            ['UserId', '=', $UserId],
            ['BookId', '=', $bookId]
        ])->first();

        //return dd($productInCart);
        if ($productInCart) {
            $OldQuantity = $productInCart->Quantity;
            DB::table('shopping_cart')
                ->where([
                    ['UserId', '=', $UserId],
                    ['bookId', '=', $bookId]
                ])->update(['quantity' => $OldQuantity + $NewQuantity]);

            return redirect("/book/list");
        }


        $result = DB::table('shopping_cart')->insert(
            ['UserId' => $UserId, 'BookId' => $id, 'Quantity' => $NewQuantity]
        );

        if ($result) {
            return redirect("/book/list");
        } else {
            return $result;
        }
    }

    public function showCart(Request $request)
    {
        $UserId = $request->session()->get('userid');
        $productInCart = DB::table('shopping_cart')->where([
            ['UserId', '=', $UserId]
        ])->get();
        $allBookId = array();
        foreach ($productInCart as $value) {
            array_push($allBookId, $value->BookId);
        }

        $cartBooks = [];
        foreach ($allBookId as $value) {
            array_push($cartBooks, DB::table('Books')->where('Id', $value)->first());
        }

        $data = [$productInCart, $cartBooks];

        //return dd($data);

        return view('Book_Mid_Project.cart')->with('data', $data);
    }
}
