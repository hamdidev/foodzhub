<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Models\Slider;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    use FileUploadTrait;
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreateRequest $request)
    {
        $imagePath = $this->handleFileUpload($request, 'image');
        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->short_desc = $request->short_desc;
        $slider->status = $request->status;
        $slider->button_link = $request->button_link;

        $slider->save();

        toastr()->success('Slider created successfully');


        return to_route('admin.slider.index');
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
        $sliderData = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('sliderData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id): RedirectResponse
    {
        $slider = Slider::findOrFail($id);

        $imagePath = $this->handleFileUpload($request, 'image', $slider->image);
        $slider->image = !empty($imagePath) ? $imagePath : $slider->image;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->short_desc = $request->short_desc;
        $slider->status = $request->status;
        $slider->button_link = $request->button_link;
        $slider->save();

        toastr()->success('Slider updated successfully');


        return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $this->deleteFile($slider->image);
            $slider->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}
