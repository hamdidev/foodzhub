<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class CartController extends Controller
{
    function AddToCart(Request $request)
    {
        try {
            $product = Product::with(['productSizes', 'productOptions'])->findOrFail($request->product_id);
            $productSize = $product->productSizes->where('id', $request->product_size)->first();
            $productOptions = $product->productOptions->whereIn('id', $request->product_option);
            $options = [
                'product_size' => [],
                'product_options' => [],
                'product_info' => [
                    'image' => $product->thumbnail_img,
                    'slug' => $product->slug,
                ],

            ];
            if ($productSize !== null) {
                $options['product_size'] = [
                    'id' => $productSize?->id,
                    'name' => $productSize?->name,
                    'price' => $productSize?->price
                ];
            }
            foreach ($productOptions as $option) {
                $options['product_options'][] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'price' => $option->price,
                ];
            }
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
                'weight' => 0,
                'options' => $options,
            ]);
            // dd($options);
            return response(['status' => 'success', 'message' => 'Product added successfully.'], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong.'], 500);
        }
        dd($request->all());
    }
    function getCartProducts()
    {
        // $products = Cart::content();
        // return $products;
        return view('frontend.layouts.ajax.cart-items-sidebar');
    }
    function removeCartProduct($rowId)
    {
        try {
            Cart::remove($rowId);
            return response(['status' => 'success', 'message' => 'Item removed successfully.'], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong.'], 500);
        }
    }

    function index(): View
    {
        return view('frontend.pages.cart-view');
    }

    function cartQtyUpdate(Request $request)
    {
        try {

            Cart::update($request->rowId, $request->qty);
            return response(['product_total' => productTotalPrice($request->rowId)], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong.'], 500);
        }
    }
    function cartDestroy()
    {
        Cart::destroy();
        return redirect()->back();
    }
}
