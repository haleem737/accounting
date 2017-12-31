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

this is order details

<h1>order no. {{ $order->id }}</h1>
@foreach($order->items as $item)
    <li calss='list-group-item'>{{ $item->description }}</li>
    <li calss='list-group-item'>{{ $item->paper }}</li>
@endforeach

@endsection('content')