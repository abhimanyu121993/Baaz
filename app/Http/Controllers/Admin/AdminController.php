<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin');
    }

    public function userList()
    {
        $users = User::latest()->paginate(10);
        return view('Backend.userlist', compact('users'));
    }
}
