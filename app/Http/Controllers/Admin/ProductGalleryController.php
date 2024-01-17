<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Traits\MultiFilesUpload;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductGalleryController extends Controller

{
    use MultiFilesUpload;

    /**
     * Display a listing of the resource.
     */
    public function index(string $productId): View
    {
        $images = ProductGallery::where('product_id', $productId)->get();
        $product =  Product::findOrFail($productId);
        return view('admin.product.gallery.index', compact('product', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:3000'], // Validate each image in the array separately
            'product_id' => ['required', 'integer'],
        ]);



        $imagePaths = $this->handleMultiUpload($request, 'image', null, 'uploads/product_images');

        if ($imagePaths) {
            foreach ($imagePaths as $imagePath) {
                $gallery = new ProductGallery();
                $gallery->product_id = $request->product_id;
                $gallery->image = $imagePath;
                $gallery->save();
            }

            toastr()->success('Images uploaded successfully!');
        } else {
            toastr()->error('No images uploaded.');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $image = ProductGallery::findOrFail($id);
            $this->deleteFile($image->image);
            $image->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}
