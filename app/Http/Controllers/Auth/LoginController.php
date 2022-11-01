<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
        


     
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
 
//    }

//    public function login(Request $request)
//    {
//     $login = request()->input('username');

//     $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
//     request()->merge([$field => $login]);

//     if ($field == 'email') {
//         $messages = [

//             'password.required' => 'Password is required',
//             'username.required' => 'Email kosong',
//             'username.exists' => 'Email tidak terdaftar',

//         ];
//     }
//     if ($field == 'username') {
//         $messages = [
//             'username.required' => 'Username and email kosong',
//             'username.exists' => 'Username / Email tidak terdaftar',
//             'password.required' => 'Password kosong',
//         ];
//     }


//     if($field == 'email'){
//         $this->validate($request, [
//             'username' => 'required|exists:users,email',
//             'password' => 'required',
//         ], $messages);
//     }

//     if($field == 'username'){
//         $this->validate($request, [
//             'username' => 'required|exists:users,username',
//             'password' => 'required',
//         ], $messages);
//     }
//     if(Auth::attempt([$field => $login, 'password' => $request->password])){
//         return redirect('/admin');
//     }else{
//         return redirect()->route('login')->with('error', 'Username / Email and Password are wrong.');
//     }

//     return redirect()->route('login')->with(['error' => 'Username atau Password salah!!!']);
//      //JIKA SALAH MAKA KEMBALI PADA HALAMAN LOGIN DAN AKAN ADA NOTIFIKASI YANG MUNCUL
//    }
//    public function logout(Request $request)
//    {
//        $this->guard()->logout();
//        $request->session()->flush();
//        $request->session()->regenerate();
//        return redirect('/login')
//            ->withSuccess('Terimakasih, selamat datang kembali!');
//    }




}
