<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\User;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->get();
        return view('frontend.home.index', compact('sliders'));
    }
}