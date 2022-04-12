<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->paginate(5);
        return view('product', compact('products'));
    }

    public function create(Request $request)
    {
        if ($request->file('image')) {
            $image_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path("/images"), $image_name);
            $image_link = 'http://127.0.0.1:8000/images/' . $image_name;
        }
        Product::create([
            'name' => $request->name,
            'category_name' => $request->category_name,
            'brand_name' => $request->brand_name,
            'description' => $request->description,
            'image' => $image_link,
            'status' => $request->status
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $product=Product::find($id);

        return view('product_edit', ['product'=>$product]);
    }

    public function update(Request $request,$id)
    {

        $image_link=null;
        if ($request->hasFile('image')){
            $image_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path("/images"), $image_name);
            $image_link = 'http://127.0.0.1:8000/images/' . $image_name;
        }
        $product=Product::find($id);

        $product->update([
            'name' => $request->name,
            'category_name' => $request->category_name,
            'brand_name' => $request->brand_name,
            'description' => $request->description,
            'image' => $image_link ? $image_link : $product->image,
            'status' => $request->status
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $product=Product::find($id);
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        return redirect()->back();
    }
}
