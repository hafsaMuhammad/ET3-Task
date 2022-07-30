<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.AddOrder');
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
            'total_cost' => 'required',
            'order_date' => 'required',
            'customer_id' => 'numeric',
            'employee_id' => 'numeric',
        ]);

        $order = new Order([
                'total_cost'=> $request->get('total_cost'),
                'order_date'=> $request->get('order_date'),
                'customer_id'=> $request->get('customer_id'),
                'employee_id'=> $request->get('employee_id'),
            ]);

        $order->save();

        return redirect()->back()->with('msg','Order saved!');
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
        return view('orders.showOrder', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view( 'orders.editOrder' , compact('order'));
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
        $order = Order::findOrFail($id);
        $request->validate([
            'total_cost' => 'required',
            'order_date' => 'required',
            'customer_id' => 'numeric',
            'employee_id' => 'numeric',
        ]);
        $order->total_cost = $request->get('total_cost');
        $order->order_date = $request->get('order_date');
        $order->customer_id = $request->get('customer_id');
        $order->employee_id = $request->get('employee_id');
        $order->save();

        return redirect()->back()->with('msg','order saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findorfail($id)->delete();
        return  redirect()->route('orders.index')->with('msg','Order deleted successfully');
    }
}
