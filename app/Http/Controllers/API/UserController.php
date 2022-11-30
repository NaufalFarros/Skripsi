<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use MongoDB\Operation\Update;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function getImage(Request $request)
    { 
        //get user from auth sacntum token
        $user = $request->user();
       

        if($user->profile_image == 'https://ui-avatars.com/api/?'. $user->name ){
            $path = $user->profile_image;
            // dd($path);
            return response()->json($path, 200);
        }else{
            $path = Storage::url('avatars/'.$user->profile_image);
            // dd($path);
            return response()->json($path, 200);
        }
        
        
        
        

        // $user = Auth::user();
        
        // $image = Storage::disk('avatars')->get($user->profile_image);
        
    }



    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],
            [
               'username.unique' => 'Username already exists',
                'email.unique' => 'Email already exists',
            ] 
    );

        // if ($validator->fails()) {
        //     return response()->json($validator->errors()->toJson(), 400);
        // }

        //validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }


        $userRegister = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'profile_image' => 'https://ui-avatars.com/api/?' . $request->get('name'),
        ]);

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('authToken');

        return response()->json(
            [
                'access_token' => $token->plainTextToken,
                'token_type' => 'Bearer',
                'user' => $userRegister
            ]
        );
    }


    public function login(Request $request){

        //login dengan username atau email
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        //validasi email atau username
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials = [
                'email' => $request->username,
                'password' => $request->password
            ];
        } else {
            $credentials = [
                'username' => $request->username,
                'password' => $request->password
            ];
        }

        //cek login 

        //cek login
        if (!auth()->attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Username or password is incorrect'
            ], 401);
        }

        //berhasil login
        $userEmail = User::where('email', $request->username)->first();
        $userUsername = User::where('username', $request->username)->first();

        if ($userEmail) {
            $user = $userEmail;
        } else {
            $user = $userUsername;
        }

        $token = $user->createToken('authToken');

        return response()->json(
            [
                'access_token' => $token->plainTextToken,
                'token_type' => 'Bearer',
                'user' => $user
            ]
        );



        

    }

    public function fetch(Request $request){

        return response()->json([
            'user' => $request->user()
        ]);
    }

    public  function updateProfile(Request $request){

        // $data = $request->all();
        // dd($data);
        $user = User::where('_id', Auth::user()->_id)->first();
        $photoUser = $user->profile_image;

        if($photoUser != null){
            $path = public_path('storage/avatars/'.$photoUser);
            if(File::exists($path)){
                File::delete($path);
            }
        }
        if($request->name != null){
            //validasi data
            $this->validate($request->name, [
                'name' => ['required', 'string', 'max:255'],
            ]
            );

            $user = User::where('_id', Auth::user()->_id)->first();
            $user->name = $request->name;
            $user->save();
        }

        if($request->username != null){
            //validasi data
            $this->validate($request->username, [
                'username' => ['required', 'string', 'max:255', 'unique:users'],
            ],
                [
                    'username.unique' => 'Username already exists',
                ]
            );
            $user = User::where('_id', Auth::user()->_id)->first();
            $user->username = $request->username;
            $user->save();
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
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Profile Updated',
            'data' => $user
        ]);
        // $user = Auth::user();
        // $user->Update($data);
    }

    public function updatePassword(Request $request){
            
            $data = $request->all();
    
            $user = Auth::user();
    
            $user->password = Hash::make($data['password']);
    
            $user->save();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Password Updated',
                'data' => $user
            ]);
    
    }


    public function logout(Request $request){
        
       $token = $request->user()->currentAccessToken()->delete();
        
        return response()->json([
            'token' => $token,
            'status' => 'success',
            'message' => 'Logged Out'
        ]);
    }


}
