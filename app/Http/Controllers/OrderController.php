<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class OrderController extends Controller
{
    public function order(Request $req)
    {
        $req->validate([
            'user_id' => $req->user_id
        ]);

        try 
        {
            $n = Order::max('order_id')->get();
            $order_no = (int)$n->order_id + 1;
            $order = Order::create(['user_id' => $req->user_id, 'order_id' => $order_no, 'slot' => $req->slot]);
            $ttamt = 0;
            if ($order) 
            {
                for ($i = 0; $i < $req->service_type; $i++) 
                {
                    $oddtl = OrderDetail::create([
                        'order_id' => $order->id,
                        'service_type' => $req[$i]->service_type,
                        'price' => $req[$i]->price,
                    ]);
                    $ttamt += $req[$i]->price;
                }

                $orderUpdate= OrderDetail::find($oddtl->id)->update(['total_amount' => $ttamt]);
            }
            if ($orderUpdate)
            {
                $result = [
                    'data' => $orderUpdate,
                    'message' => 'Order placed succesfully',
                    'status' => 200,
                    'error' => NULL
                ];
            }
            else
            {
                $result = [
                    'data' => NULL,
                    'message' => 'Order not placed',
                    'status' => 200,
                    'error' => [
                        'message' => 'Server Error',
                        'code' => 305,
                    ]
                ];
            }
        } 
        catch (Exception $ex) 
        {
            $url = URL::current();
            Error::create(['url' => $url, 'message' => $ex->getMessage()]);
            Session::flash('error', 'Server Error ');
        }
        return response()->json($result);
    }
}
