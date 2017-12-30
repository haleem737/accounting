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

@foreach($customers as $customer)
    <li calss='list-group-item'><a href='/customers/{{ $customer->id }}'>{{ $customer->full_name }}</a></li>
@endforeach

@endsection('content')