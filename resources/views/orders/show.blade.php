<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Create New Order
@endsection('title')

<!-- custome css -->
@section('style')
<style>

body{
padding-top:50px;
margin:0 6%;
}

i:hover{
color:#00a1d6;
}

.td-cell{
vertical-align:bottom;
}

</style>
@endsection('style')


<!--Page Content -->

@section('content')

<div id='wrap' style='max-width:1300px' class='container-fluid'>
    <h2 align='center'>ORDER NO
        <span style='color:#F37021'><b>#{{sprintf("%04d", $order->id)}}</b></span>
    </h2>
    <table class="ui selectable celled table text-center">
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
            <th scope="col">Cost</th>
            <th scope="col">Price</th>
            <th scope="col">VAT 5%</th>
            <th scope="col" colspan="2">
                <div class="ui small primary icon button add_item">
                    <i class="plus icon"></i> Add Item
                </div>
            </th>
        </tr>
    </thead>
    <tbody>

@foreach($order->items as $item)

        <tr>
            <td style='vertical-align:middle' scope="row">1</td>
            <td style='min-width:20%;vertical-align:middle' scope="col">{{ $item->description }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->paper }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->size }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->colors }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->copies }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->serial }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->pack }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->qty }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->cost }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->price }}</td>
            <td style='vertical-align:middle' scope="col">{{ $item->price * .05 }}</td>
            <!-- edit item -->
            <td id='{{$item->id}}' class='edit' style='width:50px;cursor: pointer;' scope="col">
                <button id='{{$item->id}}' style='background:none;width:0' type='submit' class="ui button">
                    <i style='font-size:18px' id='{{$item->id}}' class="edit Edit icon"></i>
                </button>
            </td>
            <td style='width:50px' scope="col">
                <!-- delte item -->
                <form action="{{ '/items/'.$item->id }}?order_no={{ $order->id }}" method='post'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                    <input type="hidden" name="order_no" value="{{ $item->order_id }}">
                    <button style='background:none;width:0' type='submit' class="ui button">
                        <i style='font-size:18px' class="trash icon"></i>
                    </button>
                </form>
            </td>
        </tr>

    </tbody>
   

@endforeach

    <tfoot calass='ui olive table'>
        <tr style='background:#bfe3e3;'>
            <th scope="col"  colspan="9"></th>
            <th scope="col" style='background:#e8e8e8'></th>
            <th scope="col" style='background:#e8e8e8'><strong>{{ $total_prices }}</strong></th>
            <th scope="col" style='background:#e8e8e8'></th>
            <th scope="col" colspan="2" style='background:#e8e8e8'></th>
        </tr>
    </tfoot>
    </table>

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


// edit item
$( ".edit" ).each(function(index) {
    $(this).on("click", function(e){$('.ui.modal').modal({

// $('body').on('click', '.edit', function(e){$('.ui.modal').modal({

            onShow: function(callback) {
                    callback = $.isFunction(callback) ? callback : function(){};
                    var $content = $(this).find('.content');
                    $.get("/items/" + e.target.id + "/edit?order_no={{ $order->id }}", function(data) {
                    $content.html(data);
                });
            },

            onHidden: function(){
                location.reload();
            }

        }).modal('show')

    });
});


// add new item to order
$( ".add_item" ).each(function(index) {
    $(this).on("click", function(e){$('.ui.modal').modal({

// $('body').on('click', '.edit', function(e){$('.ui.modal').modal({

            onShow: function(callback) {
                    callback = $.isFunction(callback) ? callback : function(){};
                    var $content = $(this).find('.content');
                    $.get("/items/create?order_no={{ $order->id }}", function(data) {
                    $content.html(data);
                });
            },

            onHidden: function(){
                location.reload();
            }

        }).modal('show')

    });
});




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


@endsection('content')