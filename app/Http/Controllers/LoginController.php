<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\View;


class LoginController extends Controller
{   

    /**
     * Login form
     *
     * @return Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('login');
    }  
    
    /**
     * Authenticate
     *
     * @param Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {   
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect(route('main'))->withSuccess('Привет!');
        }
        
        return back()->with('error','Неверная пара логин/пароль');
    }

    /**
     * Logout
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {   
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    
}