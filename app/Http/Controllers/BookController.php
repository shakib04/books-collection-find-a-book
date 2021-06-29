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
        return view('Book_Mid_Project.index')->with('booksOfHome', $booksOfHome);
    }

    public function SearchBooks(Request $request)
    {
        $booksOfHome = DB::table('books')
            ->where('Name', $request->input('name'))
            ->orWhere('Name', 'like', '%' . $request->input('name') . '%')->get();

        return view('Book_Mid_Project.index')->with('booksOfHome', $booksOfHome);
    }

    public function getBooksByCatagory($category)
    {
    }

    public function BookById($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        $bookAllReviews = DB::table('book_review')->where('book_id', $id)->get();
        $data = [
            "book" => $book,
            "bookAllReviews" => $bookAllReviews
        ];
        //return dd($book);
        return view('Book_Mid_Project.single_product')->with($data);
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

    public function AddToWishList(Request $request, $id)
    {
        $userid = $request->session()->get('userid');
        $list = DB::table('userbookwishlist')->where('userid', $userid)->first();
        $AlreadyAdded = false;
        if ($list->bookid1 == $id or $list->bookid2 == $id or $list->bookid3 == $id) {
            return "<h2> Already in Wishlist</h2>";
            $AlreadyAdded = true;
        }
        if ($list->bookid1 != "" and $list->bookid2 != "" and $list->bookid3 != "") {
            return "<h2>Wishlist Filled Up! Replace with <a href='/add/wishlist/force/" . $id . "'>Lastone</a></h2>";
        }

        if ($list->bookid1 == "") {
            DB::table('userbookwishlist')
                ->where('userid', $userid)
                ->update(['bookid1' => $id]);
            return redirect("/book/list");
        } else if ($list->bookid2 == "") {
            DB::table('userbookwishlist')
                ->where('userid', $userid)
                ->update(['bookid2' => $id]);
            return redirect("/book/list");
        } else if ($list->bookid3 == "") {
            DB::table('userbookwishlist')
                ->where('userid', $userid)
                ->update(['bookid3' => $id]);
            return redirect("/book/list");
        }
        return dd($AlreadyAdded);
        //check ase naki already ("Already Exits")
        //already fill up naki
        // 3 tar beshi add hole last r ta replace option

    }

    public function AddToWishListForce(Request $request, $id)
    {
        $userid = $request->session()->get('userid');
        DB::table('userbookwishlist')
            ->where('userid', $userid)
            ->update(['bookid3' => $id]);
        return redirect("/book/list");
    }

    public function GetWishList()
    {
        $userid = session('userid');
        $wishlist = DB::table('userbookwishlist')->where([['userid', '=', $userid]])->first();
        //return dd($wishlist);
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
        return view('Book_Mid_Project.my_account.WishList')->with($data);
    }

    public function RemoveWishList($bookid)
    {
        $userid = session('userid');
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
        return redirect()->route('WishList');
    }
}
