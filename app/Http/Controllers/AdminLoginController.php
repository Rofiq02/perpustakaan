<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Admins;

class AdminLoginController extends Controller
{
    //
    
    protected $redirectTo = '/dashboard';

public function __construct()
{
    $this->middleware('guest:admins')->except('logout')->except('index');
}

public function index(){
      return view('/dashboard');
}

public function showLoginForm()
{
      return view('admins.auth.login');
}

public function showRegisterForm()
{
      return view('admins.auth.register');
}

public function username()
{
        return 'username';
}

protected function guard()
{
      return Auth::guard('admins');
}

public function register(Request $request)
{
      $request->validate([
          'username'      => 'required|string|unique:admins',
          'email'         => 'required|string|email|unique:admins',
          'password'      => 'required|string|min:6|confirmed'
      ]);
      Admins::create($request->all());
      return redirect()->route('admins.registerform')->with('success', 'Successfully register!');

}

}
