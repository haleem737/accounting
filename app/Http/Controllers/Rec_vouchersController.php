<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Rec_voucher;
use App\Customer;
use App\Order;

class Rec_vouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rec_vouchers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rec_vouchers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $co_name = $request->company_name;

        $customer = Customer::where('co_name' , $co_name)->first();

        $rec_voucher = new Rec_voucher;
        $rec_voucher->amount = $request->amount;
        $rec_voucher->being_for = $request->being_for;
        $rec_voucher->pay_method = $request->pay_method;
        $rec_voucher->order_id = 1; // $request->order_id;
        $rec_voucher->customer_id = $customer->id;
        
        $rec_voucher->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rec_vouchers.show');
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
