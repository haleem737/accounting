<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\Customer;
use App\Order;
use Input;



class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // get new order no
        $lastOrderRecord = Order::latest()->first();

        if($lastOrderRecord){
            $newOrderNo =  $lastOrderRecord->id + 1;
        }else{
            $newOrderNo =  1;
        }

        // get customer id
        $customerName = $request->copy_company_name;
        $customer_record = Customer::where('co_name',$customerName)->first();
        $customer_id = $customer_record->id;

        $order = new Order;
        $order->customer_id = $customer_id;
        $order->po_no = $request->copy_po_no;
        $order->save();

        $description = Input::get('description');
        $paper = Input::get('paper');
        $size = Input::get('size');
        $colors = Input::get('colors');
        $copies = Input::get('copies');
        $serial = Input::get('serial');
        $pack = Input::get('pack');
        $qty = Input::get('qty');
        $price = Input::get('price');
        $cost = Input::get('cost');

        for ($i = 0; $i < count($description); $i++){
        
            $data = array(
                array(
                        "description"=>$description[$i],
                        "paper"=>$paper[$i],
                        "size"=>$size[$i],
                        "colors"=>$colors[$i],
                        "copies"=>$copies[$i],
                        "serial"=>$serial[$i],
                        "pack"=>$pack[$i],
                        "qty"=>$qty[$i],
                        "price"=>$price[$i],
                        "cost"=>$cost[$i],
                        "order_id"=> $newOrderNo,
                        "customer_id"=> $customer_id,
                    ),
            ); 
            
                Item::insert($data); // Eloquent

        }


        return redirect()->route('orders.show', $newOrderNo)->with('success' , 'Order created successfully');


        
        // return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::where('id', $id)->first();
        return view('items.edit', ['item' => $item]);
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
        // $id = $request->input('order_no');
        // $orderUpdate = Item::where('order_id', '=', 1)->update([
        //     'paper'=>'cartoon paper'
        // ]);


        $itemUpdate = Item::where('id', $id)
            ->update([
                'description'=> $request->input('description'),
                'paper'=> $request->input('paper'),
                'size'=> $request->input('size'),
                'colors'=> $request->input('colors'),
                'copies'=> $request->input('copies'),
                'serial'=> $request->input('serial'),
                'pack'=> $request->input('pack'),
                'qty'=> $request->input('qty'),
                'price'=> $request->input('price'),
                'cost'=> $request->input('cost')
        ]);

        if($itemUpdate){
            return redirect()->route('orders.show', $request->input('order_no'))->with('success' , 'Order updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item = Item::find($id);
        $item->delete();

        $order_no = $request->input('order_no');
        $order = Order::where('id', $order_no)->first();

        $prices = Item::where('order_id', $order_no)->pluck('price')->toArray();
        $total_prices = array_sum($prices);
        
        return view('orders.show', ['order' =>  $order] , ['total_prices' => $total_prices])->with('success' , 'Item Deleted successfully');;
    }
}