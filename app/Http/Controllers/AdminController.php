<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array (
            'message' => 'Successfuly logged out',
            'alert-type' => 'success',
        );

        return redirect('login')->with($notification);
    }

    public function profile (){
        $id = Auth::user()->id;
        $admin_data = user::find($id);
        return view('admin.admin_profile_view', compact('admin_data'));
    }

    public function EditProfile (){
        $id = Auth::user()->id;
        $edit_data = user::find($id);
        return view('admin.admin_profile_edit', compact('edit_data'));

    }

    public function  storeprofile(Request $request){
        $id = Auth::user()->id;
        $data = user::find($id);

        if($request->file('profile_image')) {
            $file= $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data->profile_image = $filename;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;


        $data->save();

        $notification = array (
            'message' => 'Admin profile updated successfuly',
            'alert-type' => 'success',
        );

        return redirect()->Route('admin.profile')->with($notification);

    }

    public function ChangePassword(){

        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([

            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedpassword))
        {
            // $id = Auth::user()->id;
            $user = user::find(Auth::user()->id);
            $user->password = bcrypt($request->newpassword);
            $user->save();

            session()->flash('message', 'password change succesfuly');

            return redirect()->back();

        }
        session()->flash('message', 'old password incorrect');
        return redirect()->back();

    }

}
