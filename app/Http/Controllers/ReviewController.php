<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReviewController extends Controller
{
    public function ReviewABook(Request $request, $bookId)
    {

        //already commented [bookid, userid]

        $data = [
            'userid' => $request->session()->get('userid'),
            'book_id' => $bookId,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'title' => $request->title
        ];
        $result = DB::table('book_review')->insert($data);
        return ($result) ?  redirect()->route('BookById', $bookId) : '<h2>Failed to Review</h2>';
    }

    public function BookAllReview($id)
    {
        
    }
}
