<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Company::get();
        return view('Backend.brand', compact('brands'));
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
        $request->validate([
            'bname'=>'required',
            'pic'=>'nullable|image'
        ]);
        $brandpic='branddummy.jpg';
        try
        {
            if($request->hasFile('pic'))
            {
                $brandpic='brand-'.time().'-'.rand(0,99).'.'.$request->pic->extension();
                $request->pic->move(public_path('upload/brands/'),$brandpic);
            }
            $res= Company::create(['name'=>$request->bname,'image'=>$brandpic]);

            if($res)
            {
                session()->flash('success','Brand Added Sucessfully');
            }
            else
            {
                session()->flash('error','Brand not added ');
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
        $brands = Company::get();
        $id=Crypt::decrypt($id);
        $brandedit=Company::find($id);
        if($brands)
        {
            return view('Backend.brand',compact('brands','brandedit'));
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
            'bname'=>'required',
            'pic'=>'nullable|image'
        ]);
        $brandpic='branddummy.jpg';
        try
        {
            if($request->hasFile('pic'))
            {
                $brandpic='brand-'.time().'-'.rand(0,99).'.'.$request->pic->extension();
                $request->pic->move(public_path('upload/brands/'),$brandpic);
                $oldpic=Company::find($id)->pluck('image')[0];
                    unlink(public_path('upload/brands/'.$oldpic));
                    Company::find($id)->update(['image'=>$brandpic]);
            }
            $res= Company::find($id)->update(['name'=>$request->bname,'image'=>$brandpic]);

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
        Log::info('destroy fucntion');
        $id=Crypt::decrypt($id);
        try{
                $res=Company::find($id)->delete();
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
