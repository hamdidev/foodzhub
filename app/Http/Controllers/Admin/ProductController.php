<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Str;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request): RedirectResponse
    {
        $imagePath = $this->handleFileUpload($request, 'thumbnail_img');
        $product = new Product();
        $product->thumbnail_img = $imagePath;
        $product->name = $request->name;
        $product->slug = generateUniqueSlug('Product', $request->name);
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->seo_title = $request->seo_title;
        $product->seo_desc = $request->seo_desc;
        $product->category_id = $request->category;
        $product->status = $request->status;
        $product->show_at_home = $request->show_at_home;
        $product->save();

        toastr()->success('Product created successfully');


        return to_route('admin.product.index');
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
    public function edit(string $id): View
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $imagePath = $this->handleFileUpload($request, 'thumbnail_img', $product->thumbnail_img);
        $product->thumbnail_img = !empty($imagePath) ? $imagePath : $product->thumbnail_img;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->seo_title = $request->seo_title;
        $product->seo_desc = $request->seo_desc;
        $product->category_id = $request->category;
        $product->status = $request->status;
        $product->show_at_home = $request->show_at_home;
        $product->save();

        toastr()->success('Product updated successfully');


        return to_route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $product = Product::findOrFail($id);
            $this->deleteFile($product->thumbnail_img);
            $product->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}
