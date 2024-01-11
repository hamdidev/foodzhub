<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class UserProfileController extends Controller
{
    use FileUploadTrait;
    function UserProfileUpdate(Request $requset): RedirectResponse
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $requset->validate([
            "name" => ['required', 'max:100'],
            "username" => ['required', 'max:60'],
            "email" => ['required', 'unique:users,email,' . $id],
        ]);
        $data->name = $requset->name;
        $data->username = $requset->username;
        $data->email = $requset->email;
        $data->save();
        toastr('Profile updated successfully.', 'success');
        return redirect()->back();
    }
    function UserAvatarUpdate(Request $requset)
    {

        $imagePath = $this->handleFileUpload($requset, 'avatar');
        $user = Auth::user();
        $user->avatar = $imagePath;
        $user->save();
        return response(['status' => 'success', 'message' => 'Profile avatar changed successfully']);
    }
    function ChangePassword(Request $requset): RedirectResponse
    {
        $requset->validate([
            'current_password' => 'required|min:8',
            'password' => 'required|min:8|same:password_confirmation',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($requset->password);
        toastr()->success('Password changed successfully');
        return redirect()->back();
    }
}
