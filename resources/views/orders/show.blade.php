<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Create New Order
@endsection('title')

<!-- custome css -->
@section('style')
@endsection('style')


<!--Page Content -->
@section('content')

<div class='container'>
<h1 class='text-center'>order no. {{ $order->id }}</h1>
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Description</th>
            <th scope="col">Paper</th>
            <th scope="col">Size</th>
            <th scope="col">Colors</th>
            <th scope="col">Copies</th>
            <th scope="col">Serial</th>
            <th scope="col">Pack</th>
            <th scope="col">Qty</th>
            <th scope="col">Price</th>
            <th scope="col">Cost</th>
        </tr>
    </thead>
    <tbody>

@foreach($order->items as $item)

        <tr>
            <th scope="row">1</th>
            <th scope="col">{{ $item->description }}</th>
            <th scope="col">{{ $item->paper }}</th>
            <th scope="col">{{ $item->size }}</th>
            <th scope="col">{{ $item->colors }}</th>
            <th scope="col">{{ $item->copies }}</th>
            <th scope="col">{{ $item->serial }}</th>
            <th scope="col">{{ $item->pack }}</th>
            <th scope="col">{{ $item->qty }}</th>
            <th scope="col">{{ $item->price }}</th>
            <th scope="col">{{ $item->cost }}</th>
        </tr>

@endforeach

    </tbody>
    </table>
    <h2 class='text-right'>total: {{ $total_prices }}</h2>
</div>

@endsection('content')