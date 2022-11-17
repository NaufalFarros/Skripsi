<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use MongoDB\Operation\Update;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    public function index()
    {

        // $data = Auth::user();
        // dd($data);
        return view('admin.profile');
    }

    public function UbahPassword(Request $request){
    //    dd($request->all());

        $update = User::where('_id', Auth::user()->_id)->update([
            'password' => bcrypt($request->password)
        ]);

        // dd($data);
        return view('admin.profile');
    }



    public function uploadImage(Request $request){
        
        
        $user = User::where('_id', Auth::user()->_id)->first();
        $photoUser = $user->profile_image;

        if($photoUser != null){
            $path = public_path('storage/avatars/'.$photoUser);
            if(File::exists($path)){
                File::delete($path);
            }
        }

        
        
        if($request->hasFile('image')){

            
            // dd($photoUser);
            


            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $strRandom = str::random(10);
            $extension = $request->image->extension();

            $filename = Auth::user()->name.'-'.$strRandom . '.' . $extension;
            $request->image->storeAs('avatars',$filename,'public');
            auth()->user()->update([
                'profile_image' => $filename
            ]);
            
            return redirect()->back()->with('success','You have successfully upload image.');        }
    }
}
