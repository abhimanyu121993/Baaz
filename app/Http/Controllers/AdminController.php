<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function admin()
    {
        return view('Backend.login');
    }

    public function login(Request $req)
    {
        Log::info('login'.json_encode($req->all()));
        if(Auth::guard('adminauth')
            ->attempt(['email' => $req->email, 'password' => $req->password], $req->remember_me))
        {
                return view('Backend.dashboard');
        }
        else {
            return view('Backend.login');
        }
    }

    public function dashboard()
    {
        return view('Backend.dashboard');
    }
}
