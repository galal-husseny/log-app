<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    const USERNAME = 'admin';
    const PASSWORD = 'admin';

    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if ($this->attempt($request->only('username','password'))) {
            session()->put('username',$request->username);
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.page');
    }

    private function attempt(array $credentials){
        if($credentials['username'] == self::USERNAME && $credentials['password'] == self::PASSWORD){
            return true;
        }
        return false;
    }
}
