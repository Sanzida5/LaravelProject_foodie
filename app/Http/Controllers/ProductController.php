<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $data['products'] = Product::all();
        return view("admin.manageProducts", $data);
    }

    public function insert(){
        $data['categories'] = Category::all();
        return view("admin.insertProduct", $data);
    }

    public function store(Request $req){
        $data = $req->validate([
            'title' => 'required',
            'isVeg' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $filename = time() . "_" . $req->file('image')->getClientOriginalName();
        $req->file('image')->storeAs("public", $filename);

        $data['image'] = $filename;

        Product::create($data);

        return redirect()->route("admin.product.index")->with("msg", "Product inserted successfully");
    }

    public function edit($id){
        $data['product'] = Product::findOrFail($id);
        $data['categories'] = Category::all();

        return view("admin.editProduct", $data);
    }

    public function update(Request $req, $id){
        $product = Product::findOrFail($id);

        $data = $req->validate([
            'title' => 'required',
            'isVeg' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'nullable',
        ]);

        if ($req->hasFile('image')) {
            $filename = time() . "_" . $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs("public", $filename);
            $data['image'] = $filename;
        }

        $product->update($data);

        return redirect()->route("admin.product.index")->with("msg", "Product updated successfully");
    }

    public function removeProduct(Request $req, $id){
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route("admin.product.index")->with("msg", "Product deleted successfully");
    }
}