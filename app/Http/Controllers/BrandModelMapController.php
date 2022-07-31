<?php

namespace App\Http\Controllers;

use App\Models\BrandModelMap;
use App\Models\Error as ModelsError;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class BrandModelMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandmodels = BrandModelMap::get();
        return view('Backend.brandmodel', compact('brandmodels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('store model'.json_encode($request->all()));
        $request->validate([
            'mname'=>'required',
            'pic'=>'nullable|image'
        ]);
        try
        {
            $res= BrandModelMap::create(['name'=>$request->mname,'image'=>$modelpic]);

            if($res)
            {
                session()->flash('success','Model Added Sucessfully');
            }
            else
            {
                session()->flash('error','Model not added ');
            }
        }
        catch(Exception $ex)
        {
            $url=URL::current();
            ModelsError::create(['url'=>$url,'message'=>$ex->getMessage()]);
            Session::flash('error','Server Error ');
        }
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $models = BrandModelMap::get();
        $id=Crypt::decrypt($id);
        $modeledit=BrandModelMap::find($id);
        if($modeledit)
        {
            return view('Backend.brandmodel',compact('models','modeledit'));
        }
        else
        {
            session::flash('error','Something Went Wrong OR Data is Deleted');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mname'=>'required',
            'pic'=>'nullable|image'
        ]);
        $brandpic='branddummy.jpg';
        try
        {
            if($request->hasFile('pic'))
            {
                $modelpic='brand-'.time().'-'.rand(0,99).'.'.$request->pic->extension();
                $request->pic->move(public_path('upload/models/'),$modelpic);
                $oldpic=BrandModelMap::find($id)->pluck('image')[0];
                    unlink(public_path('upload/models/'.$oldpic));
            }
            $res= BrandModelMap::find($id)->update(['name'=>$request->mname,'image'=>$modelpic]);

            if($res)
            {
                session()->flash('success','Brand Updated Sucessfully');
            }
            else
            {
                session()->flash('error','Brand not updated ');
            }
        }
        catch(Exception $ex)
        {
            $url=URL::current();
            Error::create(['url'=>$url,'message'=>$ex->getMessage()]);
            Session::flash('error','Server Error ');
        }
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=Crypt::decrypt($id);
        try{
                $res=BrandModelMap::find($id)->delete();
                if($res)
                {
                    session()->flash('success','Brand deleted ducessfully');
                }
                else
                {
                    session()->flash('error','Brand not deleted ');
                }
            }
            catch(Exception $ex)
            {
                $url=URL::current();
                Error::create(['url'=>$url,'message'=>$ex->getMessage()]);
                Session::flash('error','Server Error ');
            }
            return redirect()->back();
    }
}
