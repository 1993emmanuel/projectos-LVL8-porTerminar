<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Provider;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        //
        $products = Product::get();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        //
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.products.create',compact('categories','providers'));
    }

    public function store(StoreRequest $request)
    {
        //
        //procesamiento para almacenar la imagen
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/image'),$image_name);
            //
            $product = Product::create($request->all()+[
                'image'=>$image_name,
            ]);
            $product->update(['code'=>$product->id]);
            return redirect()->route('products');
        }

    }

    public function show(Product $product)
    {
        //
        return view('admin.products.show',compact('product'));
    }

    public function edit(Product $product)
    {
        //
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.products.edit',compact('product','categories','providers'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        //
        //procesamiento para almacenar la imagen
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/image'),$image_name);
            $product->update($request->all()+[
                'image'=>$image_name,
            ]);
            return redirect()->route('products');
        }
    }

    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('categories.index');
    }

    public function change_status(Product $product){
        if($product->status == 'ACTIVE'){
            $product->update(['status'=>'DESACTIVE']);
            return redirect()->back();
        }else{
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        }
    }
    

}
