<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\order;

class PackageController extends Controller
{
    function index(Request $request){
        $search = $request->get('search');
        $trangthai= $request->get('trangthai');
        // $data['order']= order::query();
    	$data['order'] = order::where('state', 1)
       -> orderby('updated_at', 'ASC')->paginate(8);
    //    if($trangthai != null){
    //     $data['order']->where('order.trangthai',$trangthai);
    //  }
    	return view('backend.package.index', [
            'order'=>	$data['order'],

            'trangthai'=>$trangthai
        ]);
    }
    function GetDetail($id_order){
    	$data['order'] = order::find($id_order);
    	return view('backend.package.detail', $data);
    }
    function GetUnfinished(){
    	$data['order'] = order::where('trangthai', 0)->where('state',1)->orderby('updated_at', 'DESC')->paginate(8);
    	return view('backend.package.unfinished', $data);
    }
    function GetProcessed(){
    	$data['order'] = order::where('trangthai', 1)->orderby('updated_at', 'DESC')->paginate(8);
    	return view('backend.package.edit', $data);
    }
    function GetTransport(){
    	$data['order'] = order::where('trangthai', 2)->orderby('updated_at', 'DESC')->paginate(8);
    	return view('backend.package.transport', $data);
    }
    function GetSuccessfult(){
    	$data['order'] = order::where('trangthai', 3)->orderby('updated_at', 'DESC')->paginate(8);
    	return view('backend.package.successful', $data);
    }
    function paid($id_order){
        $order = order::find($id_order);
    	$order->trangthai = 1;
    	$order->save();

    	return redirect('/admin/package/edit')->with('thongbao', 'đóng gói đơn hàng thành công!');
    }
    function transport($id_order){
        $order = order::find($id_order);
    	$order->trangthai = 2;
    	$order->save();

    	return redirect('/admin/package/transport')->with('thongbao', 'Đơn hàng đang giao');
    }
    function successful($id_order){
        $order = order::find($id_order);
    	$order->trangthai = 3;
    	$order->save();

    	return redirect('/admin/package/successful')->with('thongbao', 'Đơn hàng đã giao thành công !');
    }
}
