<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;

class TestApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksOfHome = DB::table('book_categories')->get();
        return $booksOfHome;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('book_categories')->insert(
            ['CategoryName' => $request->CategoryName]
        );

        return response("cat added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = DB::table('book_categories')->where('CategoryId', $id)->first();
        if (!$cat) {
            return response("id not found");
        }
        //return response()->json($cat);
        return response()->json($cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        DB::table('book_categories')
            ->where('CategoryId', $id)
            ->update(['CategoryName' => $request->CategoryName]);
        return response("cat updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = DB::table('book_categories')->where('CategoryId', $id)->first();
        if (!$cat) {
            return response("id not found");
        }

        DB::table('book_categories')->where('CategoryId', '=', $id)->delete();
        return response("deleted");
    }
}
