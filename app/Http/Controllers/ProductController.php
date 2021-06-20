<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return view('Product.product_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            // echo "file name: ".$file->getClientOriginalName()."<br>";
            // echo "file extension: ".$file->getClientOriginalExtension()."<br>";
            // echo "file Mime Type: ".$file->getType()."<br>";
            // echo "file Size: ".$file->getSize();

            $fileName = $request->product_name . time() . "." . $file->getClientOriginalExtension();
            if ($file->move('upload', $fileName)) {
                echo "success";
            } else {
                echo "error..";
            }
        } else {
            echo "file not found! ";
        }

        $result = DB::table('products')->insert(
            [
                'product_name' => $request->product_name,
                'product_descr' => $request->product_descr,
                'product_image' => $fileName,
            ]
        );

        if ($result) {
            return redirect("/product/all");
        } else {
            echo "Failed to Create";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        //$product = DB::table('products')->where('product_id', $id)->first();
        $product = Product::find($id);
        //return dd();
        return view('Product.product_details')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        ///return dd($product);
        return view('Product.edit_product')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $result = DB::table('products')
            ->where('product_id', $id)
            ->update([
                'product_name' => $request->product_name,
                'product_descr' => $request->product_descr
            ]);

        if ($result) {
            return redirect('/product/all');
        } else {
            return redirect('/product/all');
            //return dd($result);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $result = DB::table('products')->where('product_id', '=', $id)->delete();
        if ($result) {
            return redirect('/product/all');
        } else {
            return "<h2 style='color:red; backgroud:black; display: inline-block'> Failed to delete </h2>";
        }
    }
}
