<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyModel;
use App\Models\Error;
use App\Models\FuelType;
use App\Models\OfferBanner;
use App\Models\Service;
use App\Models\Slider;
use App\Models\UserVehicleMap;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function company()
    {
        try
        {
            $company = Company::get();
            if ($company)
            {
                $result = [
                    'data' => $company,
                    'message' => 'Company details found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Company details not found',
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

    public function companyModel(Request $req)
    {
        try
        {
            $model = CompanyModel::where('cid', $req->cid)->get();
            if ($model)
            {
                $result = [
                    'data' => $model,
                    'message' => 'Company model details found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Company details not found',
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

    public function slider()
    {
        try
        {
            $slider = Slider::get();
            if ($slider)
            {
                $result = [
                    'data' => $slider,
                    'message' => 'Slider details found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Slider details not found',
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

    public function offerBanner()
    {
        try
        {
            $offerBanner = OfferBanner::get();
            if ($offerBanner)
            {
                $result = [
                    'data' => $offerBanner,
                    'message' => 'Company details found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Company details not found',
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

    public function fuelType()
    {
        try
        {
            $fuelType = FuelType::get();
            if ($fuelType)
            {
                $result = [
                    'data' => $fuelType,
                    'message' => 'Fuel type found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Fuel type not found',
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

    public function category()
    {
        try
        {
            $category = Category::get();
            if ($category)
            {
                $result = [
                    'data' => $category,
                    'message' => 'Category details found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Category details not found',
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

    public function services()
    {
        try
        {
            $services = Service::get();
            if ($services)
            {
                $result = [
                    'data' => $services,
                    'message' => 'Services found',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Services not found',
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
            'userid' => 'required',
            'modelid' => 'required',
            'fueltype' => 'required'
        ]);

        try
        {
            $batchno = $req->userid.time().rand(1,99);
            $data = [
                'userid' => $req->userid,
                'modelid' => $req->modelid,
                'fueltype' => $req->fueltype,
                'batchno' => $batchno
            ];
            $uservehiclemap = UserVehicleMap::create($data) ;
            if ($uservehiclemap)
            {
                $result = [
                    'data' => $uservehiclemap,
                    'message' => 'Login successfully',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Login Unsuccessful',
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
