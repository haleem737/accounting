<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' =>  $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->full_name = $request->full_name;
        $customer->co_name = $request->co_name;
        $customer->tel = $request->tel;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->route('home')->with('success' , 'Customer ' . $request->input('full_name') . ' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show', ['customer' =>  $customer]);
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

    // search for customer using ajax
    public function findCustomer(){

        $search = $_GET['query'];
        $customers = Customer::where('co_name', 'LIKE','%'.$search.'%')->get();
        
        
        if(count($customers) == 0){
            $searchResult = 'now customer found';
        }else{
            foreach($customers as $key =>$value){
                $searchResult[] = $value->co_name;
            }
        }

        return $searchResult;

    }
    
}
