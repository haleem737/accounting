<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
View Orders
@endsection('title')

<!-- custome css -->
@section('style')
@endsection('style')


<!--Page Content -->
@section('content')

<div class='container'>
    <table class="ui selectable celled table text-center">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Date</th>
                <th scope="col">Customer</th>
                <th scope="col">Company</th>
                <th scope="col">P.O. No</th>
            </tr>
        </thead>
    <tbody>
        @foreach($orders as $order)
            <tr class='clickable-row' style='cursor: pointer;' data-href='/orders/{{ $order->id }}'>
                <th scope="row">#{{ sprintf("%04d", $order->id) }}</th>
                <td>{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                <td>{{ $order->customer->full_name }}</td>
                <td>{{ $order->customer->co_name }}</td>
                <td>{{ $order->po_no }}</td>
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


@include('partials.sidebar')


@endsection('content')