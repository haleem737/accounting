<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Customer;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::with(['customer', 'items'])->get();
        
        return view('orders.index', ['orders' =>  $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get new job order number
        $lastOrderRecord = Order::latest()->first();

        if($lastOrderRecord){
            $newOrderNo =  $lastOrderRecord->id + 1;
        }else{
            $newOrderNo =  1;
        }

        // add 000 to order no
        $newOrderNoPadded= sprintf("%04d", $newOrderNo);
        
        // get current date
        $dateAndTime = Carbon::now();
        $ksaTime = $dateAndTime->addHours(3);
        $date = $ksaTime->format('d-m-Y');

        
        return view('orders.create')->with('date',$date)->with('newOrderNum',$newOrderNoPadded);
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
        $order = Order::find($id);
        /*foreach ($order->items as $item) {
            $get_item = $item;
        }*/

        return view('orders.show', ['order' =>  $order]);

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
}
