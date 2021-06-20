<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class CategoryController extends Controller
{
    public function Add()
    {
        return view('category.add_post_categoy');
    }

    public function StoreCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'status' => 'required|unique:categories|max:25|min:4',
        ]);

        $data = [
            "name" => $request->name,
            "status" => $request->status,
        ];
        $category = DB::table('categories')->insert($data);

        if ($category) {
            return "Inserted";
        } else {
            return "Failed to insert";
        }

        //return "Name: " . $request->name . "<br/>Status: " . $request->status . "<br/> <a href='" . route('add.category') .  "' class='btn btn-link'> Back</a>";
    }

    public function getAllCategories(Request $request)
    {
        $result = DB::table('categories')->get();
        return view('posts.all_cateogories')->with('cats', $result);
        //print_r($result);
    }
}
