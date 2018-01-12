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

<li>{{ $customer->full_name }}</li>
<li>{{ $customer->co_name }}</li>
<li>{{ $customer->tel }}</li>
<li>{{ $customer->mobile }}</li>
<li>{{ $customer->email }}</li>


@endsection('content')