<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    public function login(Request $request)
//    {
//        dump($request->email);
//        die();
//
//        $request->validate([
//            'email' => 'required',
//            'password' => 'required'
//        ]);
//
////        $credentials = $request->only('email', 'password');
////
////        if (Auth::attempt($credentials)) {
////            $user = Auth::user();
////            $userRole = $user->role;
////            if ($userRole == \App\Models\User::ROLE_AUTHOR) {
////                /*Author*/
////                return redirect()->route('author');
////            } elseif ($userRole == \App\Models\User::ROLE_USER) {
////                redirect('/');
////                return view('home');
////            }
////        }
////        if (Auth::attempt($request->only('email', 'password'))) {
//            $user = Auth::user();
//            $b =Auth::attempt($request->only('email', 'password'));
//            //            return response()->json($user, 200);
//            return $b;
//
////        }
////        return response()->json([
////            'status' => false,
////        ]);
//
////        throw ValidationException::withMessages([
////            'email' => __('auth.failed')
////        ]);
//    }
}
