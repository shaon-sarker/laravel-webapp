<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Jobs\SendNewProductEmail;

class ProductController extends Controller
{
    public function __construct()
    {
        // Apply the CheckAdmin middleware to the entire controller
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_info = Product::select(['id','name','price','quantity'])->paginate(5);
        return view('product.index',compact('product_info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $category_info = Category::select(['id','catgeory_name'])->get();
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        // dd($request->all());
       $product = Product::insert([
            // 'category_id'=>$request->category_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);
        SendNewProductEmail::dispatch($product);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_info =  Product::find($id);
        // $category_info = Category::select(['id','catgeory_name'])->get();
        return view('product.edit',compact('product_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product_info =  Product::find($id);
        $product_info->update([
            // 'category_id'=>$request->category_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_info =  Product::find($id);
        $product_info->delete();
        return redirect()->route('product.index');
    }

    public function purchaseProduct(Request $request, $productId)
    {
        // Logic to process the product purchase

        // Retrieve the purchased product
        $product = Product::find($productId);

        // Trigger the ProductPurchased event
        event(new \App\Events\ProductPurchased($product));
        return redirect()->route('product.index');

        // Rest of your logic
    }
}
