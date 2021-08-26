<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{
    public function getAllBooksForHome()
    {
        $booksOfHome = DB::table('books')->get();
        return response()->json($booksOfHome);
        return view('Book_Mid_Project.index')->with('booksOfHome', $booksOfHome);
    }

    public function SearchBooks(Request $request)
    {
        $booksOfHome = DB::table('books')
            ->where('Name', $request->input('name'))
            ->orWhere('Name', 'like', '%' . $request->input('name') . '%')->get();
        return $booksOfHome;
        return view('Book_Mid_Project.index')->with('booksOfHome', $booksOfHome);
    }

    public function getBooksByCatagory($category)
    {
    }

    public function BookById($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        return json_encode($book);
        $bookAllReviews = DB::table('book_review')->where('book_id', $id)->get();
        $data = [
            "book" => $book,
            "bookAllReviews" => $bookAllReviews
        ];

        return view('Book_Mid_Project.single_product')->with($data);
    }


    public function RemoveFromCart(Request $request, $id)
    {
        $UserId = $request->userid;
        $cart_id = $id;
        $result = DB::table('shopping_cart')->where('cart_id', '=', $cart_id)->delete();
        return json_encode($result);
    }

    public function AddToCart(Request $request, $id)
    {
        //$UserId = $request->session()->get('userid');
        $UserId = $request->userid;
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

            return [
                "BookId" => $id,
                "UserId" => $UserId,
                "Quantity" => $OldQuantity + $NewQuantity
            ];
            return redirect("/book/list");
        }


        $result = DB::table('shopping_cart')->insert(
            ['UserId' => $UserId, 'BookId' => $id, 'Quantity' => $NewQuantity]
        );

        return [
            "BookId" => $id,
            "UserId" => $UserId,
            "Quantity" => $NewQuantity
        ];

        if ($result) {
            return redirect("/book/list");
        } else {
            return $result;
        }
    }

    public function showCart(Request $request)
    {

        $userid = $request->userid;
        $totalAmountToPay = DB::table('books')
            ->join('shopping_cart', 'books.Id', '=', 'shopping_cart.BookId')
            ->where('shopping_cart.UserId', '=', $userid)
            ->sum(DB::raw('shopping_cart.Quantity * books.Price'));

        //$UserId = $request->session()->get('userid');
        $UserId = $request->userid;

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

        $data = [$productInCart, $cartBooks, $totalAmountToPay];


        return json_encode($data);
        return view('Book_Mid_Project.cart')->with('data', $data);
    }

    public function AddToWishList(Request $request, $id)
    {
        //$userid = $request->session()->get('userid');
        $userid = $request->userid;
        $list = DB::table('userbookwishlist')->where('userid', $userid)->first();
        $AlreadyAdded = false;

        if ($list) {
            if ($list->bookid1 == $id or $list->bookid2 == $id or $list->bookid3 == $id) {
                return -3;
                return "<h2> Already in Wishlist</h2>";
                $AlreadyAdded = true;
            }

            if ($list->bookid1 != "" and $list->bookid2 != "" and $list->bookid3 != "") {
                return -2;
                return "<h2>Wishlist Filled Up! Replace with <a href='/add/wishlist/force/" . $id . "'>Lastone</a></h2>";
            }

            if ($list->bookid1 == "") {
                DB::table('userbookwishlist')
                    ->where('userid', $userid)
                    ->update(['bookid1' => $id]);
                return 1;
                return redirect("/book/list");
            } else if ($list->bookid2 == "") {
                DB::table('userbookwishlist')
                    ->where('userid', $userid)
                    ->update(['bookid2' => $id]);
                return 1;
                return redirect("/book/list");
            } else if ($list->bookid3 == "") {
                DB::table('userbookwishlist')
                    ->where('userid', $userid)
                    ->update(['bookid3' => $id]);
                return 1;
                return redirect("/book/list");
            }
            return dd($AlreadyAdded);
            //check ase naki already ("Already Exits")
            //already fill up naki
            // 3 tar beshi add hole last r ta replace option

        } else {

            DB::table('userbookwishlist')->insert(
                ['userid' => $userid, 'bookid1' => $id]
            );
            return 1;
            return redirect("/book/list");
        }
    }

    public function AddToWishListForce(Request $request, $id)
    {
        //$userid = $request->session()->get('userid');
        $userid = $request->userid;
        $result = DB::table('userbookwishlist')
            ->where('userid', $userid)
            ->update(['bookid3' => $id]);

        return $result;
        return redirect("/book/list");
    }

    public function  GetWishList(Request $request)
    {
        //$userid = session('userid');
        $userid = $request->userid;
        $wishlist = DB::table('userbookwishlist')->where([['userid', '=', $userid]])->first();
        //return dd($wishlist);
        if ($wishlist) {
            $book1 = DB::table('books')->where([['Id', '=', $wishlist->bookid1]])->first();
            $book2 = DB::table('books')->where([['Id', '=', $wishlist->bookid2]])->first();
            $book3 = DB::table('books')->where([['Id', '=', $wishlist->bookid3]])->first();
            $books = [
                "book1" => $book1,
                "book2" => $book2,
                "book3" => $book3
            ];
            $data = [
                "wishlist" => $wishlist,
                "books" => $books
            ];
            return json_encode($data);
            return view('Book_Mid_Project.my_account.WishList')->with($data);
        } else {
            $data = [
                "wishlist" => [-1]
            ];
            return json_encode($data);
            return view('Book_Mid_Project.my_account.WishList')->with($data);
        }
    }

    public function RemoveWishList($bookid, Request $request)
    {
        //$userid = session('userid');
        $userid = $request->userid;
        $result = DB::table('userbookwishlist')
            ->where('userid', $userid)
            ->first();


        if ($result->bookid1 == $bookid) {
            DB::table('userbookwishlist')
                ->where('userid', $userid)
                ->update(['bookid1' => ""]);
        } elseif ($result->bookid2 == $bookid) {
            DB::table('userbookwishlist')
                ->where('userid', $userid)
                ->update(['bookid2' => ""]);
        } elseif ($result->bookid3 == $bookid) {
            DB::table('userbookwishlist')
                ->where('userid', $userid)
                ->update(['bookid3' => ""]);
        }
        return 1;
        return redirect()->route('WishList');
    }
}
