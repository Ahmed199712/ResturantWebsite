<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::latest()->get();

        return view('admin.orders.index' , compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        $order->status = 1;
        $order->save();

        return view('admin.orders.show' , compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json($order);
    }

    public function active(Request $request)
    {
        $id = $request->id;
        $order = Order::findOrFail($id);

        if( $order->active == 0 ){
            $order->active = 1;
            $order->save();
        }else{
            $order->active = 0;
            $order->save();
        }

        return response()->json($order);
    }

    public function getAll()
    {
        $orders = Order::latest()->get();

        return view('admin.orders.getAll' , compact('orders'));
    }
}
