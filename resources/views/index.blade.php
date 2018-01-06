<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
HOME PAGE
@endsection('title')
<style>

a{
margin:80px 50px;
background:#009585;
color:white;
font-size:50px;
}

</style>


@section('style')
@endsection('style')


<!--Page Content -->
@section('content')

<a href='/customers'>customers</a>
<a href='/customers/create'>New Customer</a>
<a href='/orders'>orders</a>
<a href='/orders/create'>New Order</a>
<a href='/rec_vouchers/create'>New Recipt voucher</a>

@endsection('content')