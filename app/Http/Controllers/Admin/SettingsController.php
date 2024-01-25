<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\View\View;

class SettingsController extends Controller
{
    function index(): View
    {

        return view('admin.setting.index');
    }
    function updateGeneralSettings(Request $request)
    {
        $validatedData = $request->validate([
            'site_name' => ['required', 'max:255'],
            'default_currency' => ['required', 'max:4'],
            'currency_icon' => ['required', 'max:4'],
            'icon_position' => ['required', 'max:255'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }
        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        toastr()->success('Updated successfully!');
        return redirect()->back();
    }
}
