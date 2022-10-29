<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use MongoDB\Operation\Update;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Auth::user();
        // dd($data);
        return view('admin.profile');
    }

    public function UbahPassword(Request $request,$id){
    //    dd($request->all());
        $data = Auth::user();

        $update = User::where('_id', $id)->update([
            'password' => bcrypt($request->password)
        ]);

        // dd($data);
        return view('admin.profile');
    }
}
