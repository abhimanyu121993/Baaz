<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function userProfile(Request $req)
    {
        try
        {
            $user = User::where('id', $req->id);
            if ($user)
            {
                $result = [
                    'data' => $user,
                    'message' => 'User Found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'User not found',
                    'status' => 200,
                    'error' => [
                        'message' => 'Server Error',
                        'code' => 305,
                    ]
                ];
            }
            return response()->json($result);
        }
        catch (Exception $ex)
        {
            $url=URL::current();
            Error::create(['url'=>$url,'message'=>$ex->getMessage()]);
        }
    }

    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|string|min:3|max:255',
            'mobile' => 'required|min:10|max:10',
            'email' => 'required|email|max:255',
        ]);
        try
        {
            $data = [
                'name' => $req->name,
                'mobileno' => $req->mobileno,
                'email' => $req->email
            ];
            $user = User::where('id', $req->id)->update($data);
            if ($user)
            {
                $result = [
                    'data' => $user,
                    'message' => 'User data updated successfully',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'User data not updated',
                    'status' => 200,
                    'error' => [
                        'message' => 'Server Error',
                        'code' => 305,
                    ]
                ];
            }
            return response()->json($result);
        }
        catch (Exception $ex)
        {
            $url=URL::current();
            Error::create(['url'=>$url,'message'=>$ex->getMessage()]);
        }
    }
}
