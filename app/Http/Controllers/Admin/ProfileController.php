<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function reset(){
        return view('backend.profile.reset');
    }
    public function profile(){
        $user = User::find(Auth::user()->id);
        return view('backend.profile.profile', compact('user'));
    }

    public function profile_update(Request $r)
    {
        $id =Auth()->user()->id;
        $validated = $r->validate([
            'profile' => 'required',
        ]);

        $old_img = $r->old_img;
        $check = $r->file('profile');

        if(!$check){
            $updateImageName = $old_img;
           
        }else{
            unlink('public/images/'.$old_img);
            $newImageName = time() . '-' . $r->file('profile')->getClientOriginalName();
            $dir = $r->profile->move(public_path('images/'),$newImageName);
            $updateImageName  = $newImageName;
        }
        User::find($id)->update([
            'profile' => $updateImageName,
        ]);
        notify()->success("Profile updated Successfully !!","Success");
        return redirect('admin/profile');
    }

    public function passwordchange(Request $r)
    {
        $validated = $r->validate([
            'old_password' => 'required',
            'password' => 'required | min:5',
            'confirm_password' => 'required | same:password',
        ]);
        $hashedpwd = Auth()->user()->password;
        if(Hash::check($r->old_password, $hashedpwd)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($r->password);
            $user->save();
            Auth::logout();
            return redirect()->back();
        }else{
            notify()->error("Password Not Match","Error");
            return redirect()->back();
        }
        
    }
}
