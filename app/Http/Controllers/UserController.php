<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserVehicleMap;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function showProfile(Request $req)
    {
        $req->validate([
            'user_id' => 'required'
        ]);
        try
        {
            $user = User::find($req->user_id);
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
            'user_id' => 'required',
            'name' => 'nullable|string|min:3|max:255',
            'mobileno' => 'required|min:10|max:10',
            'email' => 'nullable|email|max:255',
            'dob' => 'nullable',
            'gender' => 'nullable'
        ]);
        try
        {
            $data = [
                'name' => $req->name,
                'mobileno' => $req->mobileno,
                'email' => $req->email,
                'dob' => $req->dob,
                'gender' => $req->gender
            ];
            $user = User::find($req->user_id);
            Log::info('user'.json_encode($user));
            if($user)
            {
                $userUpdate=$user->update($data);
            }
            if ($userUpdate)
            {
                $result = [
                    'data' => $userUpdate,
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

    public function userVehicleMap(Request $req)
    {
        $req->validate([
            'user_id' => 'required',
            'model_id' => 'required',
            'fuel_type_id' => 'required'
        ]);

        try
        {
            $batchno = $req->user_id.'-'.time().'-'.rand(1,99);
            $data = [
                'userid' => $req->user_id,
                'modelid' => $req->model_id,
                'fueltype' => $req->fuel_type_id,
                'batchno' => $batchno
            ];
            $uservehiclemap = UserVehicleMap::create($data) ;
            if ($uservehiclemap)
            {
                $result = [
                    'data' => $uservehiclemap,
                    'message' => 'Vehicle added successfully',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Vehicle not added successfully',
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

    public function userVehicles(Request $req)
    {
        $req->validate([
            'user_id' => 'required'
        ]);
        try
        {
            $uservehicle = User::with('userHasVehicles')->find($req->user_id);
           // $uservehicle->userHasVehicles;
            if ($uservehicle)
            {
                $result = [
                    'data' => $uservehicle,
                    'message' => 'User vehicles details found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'User vehicles not found',
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

    public function fetchUserAddress(Request $req)
    {
        $req->validate([
            'user_id' => 'required'
        ]);
        try
        {
            $user = User::with('userad')->find($req->user_id);
            $user->userad;
            return $user;
            if ($user)
            {
                $result = [
                    'data' => $user,
                    'message' => 'User address found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'User address not found',
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

    public function updateUserAddress(Request $req)
    {
        $req->validate([
            'user_id' => 'required',
            'address' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'pincode' => 'nullable',
            'status' => 'nullable'
        ]);
        try
        {
            $data = [
                'address' => $req->address,
                'city' => $req->city,
                'state' => $req->state,
                'country' => $req->country,
                'pincode' => $req->pincode,
                'status' => $req->status
            ];
            $user = User::find($req->user_id)->update($data);
            if ($user)
            {
                $result = [
                    'data' => $user,
                    'message' => 'User address updated successfully',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'User address not updated',
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
