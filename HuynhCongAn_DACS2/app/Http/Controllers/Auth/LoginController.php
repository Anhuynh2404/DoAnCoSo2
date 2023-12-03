<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
//   /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//    public function create()
//    {
//        return view('auth.signin');
//    }


//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {

//        $credentials = $request->only('email', 'password');

//        $rememberMe = $request->rememberMe ? true : false;

//        if (Auth::attempt($credentials, $rememberMe)) {
//            $request->session()->regenerate();

//            return redirect()->intended('/dashboard');
//        }



//        return back()->withErrors([
//            'message' => 'The provided credentials do not match our records.',
//        ])->withInput($request->only('email'));
//    }



//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Request $request)
//    {
//        Auth::logout();

//        $request->session()->invalidate();

//        $request->session()->regenerateToken();

//        return redirect('/sign-in');
//    }
}
