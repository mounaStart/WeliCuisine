<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:admin')->except('logout');
            $this->middleware('guest:agentr')->except('logout');
            $this->middleware('guest:client')->except('logout');
    }

    // protected function credentials(Request $request)
    // {
    //     return array_merge(
    //         $request->only($this->username(), 'password'),
    //         ['verification_code'=>null] 

    //     ) ;
       
    // }
     public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'verification_code'=>null], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

     
    public function showAgentLoginForm()
    {
        return view('auth.login', ['url' => 'agentr']);
    }
   

    public function agentrLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('agentr')->attempt(['email' => $request->email, 'password' => $request->password,'verification_code'=>null], $request->get('remember'))) {

            return redirect()->intended('/agentr');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showClientLoginForm()
    {
        return view('auth.login', ['url' => 'client']);
    }
    
    public function clientLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password,'verification_code'=>null], $request->get('remember'))) {

            return redirect()->intended('/client');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}