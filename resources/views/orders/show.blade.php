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
            <th scope="col"><a class="edit" id='{{$item->id}}' href="#">Edit</a></th>
        </tr>   

@endforeach

    </tbody>
    </table>
    <h2 class='text-center'>total: {{ $total_prices }}</h2>

</div>

<div class="ui popup" data-id="123"></div>
<div class="ui modal" data-id="567">

    <i class="close icon"></i>
    <div class="header text-center">Edit Item</div>
    <div class="content">
    </div>

</div>

@section('script')

<script>

$(document).ready(function(){


$( ".edit" ).each(function(index) {
    $(this).on("click", function(e){$('.ui.modal').modal({

// $('body').on('click', '.edit', function(e){$('.ui.modal').modal({

            onShow: function(callback) {
                    callback = $.isFunction(callback) ? callback : function(){};
                    var $content = $(this).find('.content');
                    $.get("/items/" + e.target.id + "?order_no={{ $order->id }}", function(data) {
                    $content.html(data);
                });
            },

            onHidden: function(){
                location.reload();
            }

        }).modal('show')

    });
});

// });












    // var popupLoading = '<i class="notched circle loading icon green"></i> wait...';
    // $('.vt').popup({
    //     inline: true,
    //     on: 'hover',
    //     exclusive: true,
    //     hoverable: true,
    //     html: popupLoading,
    //     variation: 'wide',
    //     delay: {
    //         show: 400,
    //         hide: 400
    //     },
    //     onShow: function (el) { // load data (it could be called in an external function.)
    //         var popup = this;
    //         var popup_item_id;
    //         popup.html(popupLoading);
    //         $.ajax({
    //             url: "/items/" + el.id + "?order_no={{ $order->id }}"
    //         }).done(function(result) {
    //             popup.html(result);
    //         }).fail(function() {
    //             popup.html('error');
    //         });
    //     }
    // });





});



</script>
@endsection('script')



@include('partials.sidebar')



@endsection('content')