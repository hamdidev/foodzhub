<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard.index');
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function AdminLogin()
    {
        return view('admin.auth.admin_login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminProfile = User::find($id);
        return view('admin.profile.admin_profile', compact('adminProfile'));
    }



    public function AdminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->zip_code = $request->zip_code;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->position = $request->position;
        if ($request->file('avatar')) {
            @unlink(public_path('uploads/admin_images/' . $data->avatar));
            $file = $request->file('avatar');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'), $filename);
            $data['avatar'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin profile updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8|same:password_confirmation',
        ]);
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            $notification = array(
                'message' => 'Passwords do not match.',
                'alert_type' => 'error'
            );
            return back()->with($notification);
        }
        // Update password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password changed successfully',
            'alert_type' => 'success'
        );
        return back()->with($notification);
    }
}
