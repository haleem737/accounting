<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
HOME PAGE
@endsection('title')

<!-- custome css -->
@section('style')
@endsection('style')


<!--Page Content -->
@section('content')

    <a href='/customers'>customers</a>
    <a href='/orders'>orders</a>
    <a href='/orders/create'>New Order</a>

@endsection('content')