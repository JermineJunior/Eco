<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }

    public function login(Request $request)
    {
       request()->validate([
               'email' => ['required','email'] ,'password' => ['required','min:6']
           ]);
       if(Auth::guard('admin')->attempt($this->credentials(),request('remember')))
           return redirect()->intended(route('admin.dash'));
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        
        return redirect('/');
    }

    protected function credentials()
    {
        return request()->only('email', 'password');
    }
}
