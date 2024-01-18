<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductSizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId): View
    {
        $product =  Product::findOrFail($productId);
        $sizes = ProductSize::where('product_id', $product->id)->get();

        $options = ProductOption::where('product_id', $product->id)->get();
        return view('admin.product.size.index', compact('product', 'sizes', 'options'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_id' => ['required', 'integer']
        ]);

        $size = new ProductSize();
        $size->product_id = $request->product_id;
        $size->name = $request->name;
        $size->price = $request->price;
        $size->save();

        toastr()->success('Created successfully!');

        return redirect()->back();
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $size = ProductSize::findOrFail($id);
            $size->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}
