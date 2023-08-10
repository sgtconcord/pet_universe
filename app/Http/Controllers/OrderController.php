<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $role = Auth::user()->roles->pluck('name');
        if($role[0] == 'Super Admin'){
            $datas['orders']    = Order::with('user')->get();
            $datas['role']      = $role;
            // return $datas;
            return view('admin.order.index',$datas);
        }
        else{
            $datas['orders']    = Order::where('user_id', auth()->id())->with('user')->get();
            $datas['role']      = $role[0];
            return view('admin.order.index',$datas);
        }
    }

    public function ajaxUpdateStatus(Request $request){
        $order = Order::find($request->id);

        if($order->update(['status' => $request->status])){
            return 'success';
        }
    }
}
