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
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Date</th>
                <th scope="col">Customer</th>
                <th scope="col">Company</th>
                <th scope="col">Price</th>
                <th scope="col">Balance</th>
            </tr>
        </thead>
    <tbody>
        @foreach($orders as $order)
            <tr class='clickable-row' data-href='/orders/{{ $order->id }}'>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                <td>{{ $order->customer->full_name }}</td>
                <td>{{ $order->customer->co_name }}</td>
                <td>{{ $order->customer->co_name }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>

</div>

@section('script')
<script>
$(document).ready(function(){
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

@endsection('script')

@endsection('content')