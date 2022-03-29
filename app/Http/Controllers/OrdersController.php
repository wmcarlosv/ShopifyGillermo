<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', Compact('orders'));
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
    public function destroy($id)
    {
        //
    }

    public function get_orders(){

        $response = json_decode(file_get_contents('php://input'), true);
        if(isset($response['line_items'])){
            $items = $response['line_items'];
            for($i=0;$i < count($items); $i++){
                $order = New Order();
                $order->order_no = $response['order_number'];
                $order->order_date = date('Y-m-d H:m:s', strtotime($response['created_at']));
                $order->currency = $response['currency'];
                $order->status = $response['financial_status'];
                $order->customer = $response['customer']['first_name']." ".$response['customer']['last_name'];
                $order->phone = $response['billing_address']['phone'];
                $order->country = $response['billing_address']['country'];
                $order->province = $response['billing_address']['province'];
                $order->city = $response['billing_address']['city'];
                $order->address = $response['billing_address']['address1'];
                $order->product_name = $items[$i]['name'];
                $order->price = $items[$i]['price'];
                $order->qty = $items[$i]['quantity'];
                $order->store = $items[$i]['vendor'];
                $order->save();
            }

        }
    }

    public function fast_update($id, $column, $value){
        $order = Order::findorfail($id);
        $order->$column = $value;
        $order->update();
        return json_encode($order);
    }
}
