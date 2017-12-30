<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\Customer;
use Illuminate\Support\Facades\DB;
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
        //$order_id = Input::get('order_id');
        //$customer_id = Input::get('customer_id');
        
        $arr = [];

        for ($i = 0; $i < count($description); $i++) {

            array_push($arr,

                ['description' => $description[$i],
                'paper' =>$paper[$i],
                'size' =>$size[$i],
                'colors' =>$colors[$i],
                'copies' =>$copies[$i],
                'serial' =>$serial[$i],
                'pack' =>$pack[$i],
                'qty' =>$qty[$i],
                'price' =>$price[$i],
                'cost' =>$cost[$i],
                'order_id' =>1,
                'customer_id' =>1,
                
                
                ]);
        }
        
        Item::insert($arr);  

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
}
