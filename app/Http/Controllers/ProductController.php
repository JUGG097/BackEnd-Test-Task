<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = DB::table("products")->paginate(100);
        foreach ($products as $product) {
            $categories = $product->categories;
            $categories = explode(",", json_decode($product->categories));
            $categoryNames = [];
            if (count($categories) > 0) {
                foreach ($categories as $category) {
                    $name = DB::table("categories")->where("id", "=", intval($category))->select("name")->get();
                    foreach ($name as $nam) {
                        array_push($categoryNames, $nam->name);
                    }
                }
            }

            $product->categories = $categoryNames;
        }
        return response()->json(["success" => true, "products" => $products]);
    }
}
