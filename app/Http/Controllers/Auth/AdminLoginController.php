<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }

    public function login(Request $request)
    {
       request()->validate([
               'email' => ['required','email'] ,
                'password' => ['required','min:6']
           ]);
       if(Auth::guard('admin')->attempt($this->credentials(),request('remember')))
       {
           return redirect()->intended(route('admin.dash'));
       }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        
        return redirect('/admin');
    }

    protected function credentials()
    {
        return request()->only('email', 'password');
    }
}
