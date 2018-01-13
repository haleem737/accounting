<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Order No. #{{sprintf("%04d", $order->id)}}
@endsection('title')

<!-- custome css -->
@section('style')
<style>
#page-footer{
display:none;
}


html {
  overflow-y: scroll !important;
  padding-right: 0 !important;
}

#page-footer{
padding:0;
}

body{
padding-top:50px;
margin:0 6%;
overflow-y:hidden !important;
  padding-right: 0px !important;
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


    <div class="row" style='margin-bottom:10px;background:#f9fafb;padding:25px 10px 20px 10px;border-radius:10px;border:1px solid lightgray'>

        <div class="col-md-3">

            <button class="ui primary button">Invoice</button>
            <button class="ui button">R. Voucher</button>

        </div>

        <div class="col-md-6">

            <h2 class="ui header"align='center'>ORDER NO
                <span style='color:#F37021'><b>#{{sprintf("%04d", $order->id)}}</b></span>
                <div class="sub header"><a style='color:#737373' href='/customers/{{$customer->id}}'>{{ $customer->co_name }} - {{ $customer->full_name }}</a></div>

            </h2>

        </div>

        <div class="col-md-3" align='right' style='margin:0'>

            <button style='background:none;width:0' class="ui button">
                <i style='font-size:18px' class="icon print"></i>
            </button>

            <button class="ui basic button">
                {{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
            </button>
        </div>

    </div>

    <div class="row">
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
                <th style='background:#f2f2f2' scope="col">Price</th>
                <th scope="col">VAT 5%</th>
                <th scope="col" colspan="2">
                    <div id='addNewItem' data-toggle="modal" data-target="#multiModal" class="ui small primary icon button add_item">
                        <i class="plus icon"></i> Add Item
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>

    @foreach($order->items as $item)

            <tr>
                <td style='vertical-align:middle' scope="row" class='row-index'></td>
                <td style='min-width:20%;vertical-align:middle' scope="col">{{ $item->description }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->paper }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->size }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->colors }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->copies }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->serial }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->pack }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->qty }}</td>
                <td style='vertical-align:middle' scope="col">{{ $item->cost }}</td>
                <td style='vertical-align:middle;background:#f2f2f2' scope="col">{{ $item->price }}</td>
                <td style='vertical-align:middle' scope="col">{{ number_format((float)$item->price * .05, 2, '.', '') }}</td>
                <!-- edit item -->
                <td id='{{$item->id}}' class='edit' style='width:50px;cursor: pointer;' scope="col" data-toggle="modal" data-target="#multiModal">
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
                        <button style='background:none;width:0' type='button' class="ui button" data-toggle="modal" data-target="#myModal">
                            <i style='font-size:18px' class="trash icon"></i>
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header text-center">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <h4 class="modal-title">Delte Item</h4>
                                    </div>
                                    <div class="col-md-4 pull-right">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h3 align='left'><span style='font-weight:normal'>Are you sure you want to delete this item?</span></h3>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="ui basic button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>

                            </div>
                            </div>
                        </div>

                    </form>
                </td>
            </tr>

        </tbody>


    @endforeach

        <tfoot>
            <tr style=''>
                <th style='border-top:2px solid #adadad' scope="col"  colspan="8"></th>
                <th scope="col" style='background:#f2f2f2;border-top:2px solid #adadad'><strong>TOTAL:</strong></th>
                <th data-tooltip="Total Cost" data-inverted="" scope="col" style='background:#dae2e8;border-top:2px solid #adadad'><strong >{{ number_format((float)$total_costs, 2, '.', '') }}</strong></th>
                <th data-tooltip="Total Price" data-inverted="" scope="col" style='background:#dae2e8;border-top:2px solid #adadad'><strong>{{ number_format((float)$total_prices, 2, '.', '') }}</strong></th>
                <th data-tooltip="Total VAT" data-inverted="" scope="col" style='background:#dae2e8;border-top:2px solid #adadad'><strong>{{ number_format((float)$total_VAT, 2, '.', '') }}</strong></th>
                <th data-tooltip="Total Price with VAT" data-inverted="" scope="col" colspan="2" style='background:#dae2e8;border-top:2px solid #adadad'><strong>{{ number_format((float)$total_with_VAT, 2, '.', '') }}</strong></th>
            </tr>
        </tfoot>



        </table>

    </div>


</div>


<!-- Item Modal -->
<div class="modal fade" id="multiModal">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div id='modalHeader' class="modal-header text-center">
                <div class="col-md-4"></div>
                <div class="col-md-4"><h3 class="modal-title">Edit Item</h3></div>
                <div class="col-md-4 pull-right">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>

            <!-- Modal body -->
            <div class="multi-modal-body">
                <h3 align='left'></h3>
            </div>

            <!-- Modal footer -->
            <!-- <div class="modal-footer">
                <button type="button" class="ui basic button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div> -->

        </div>
    </div>

</div>

@section('script')

<script>

$(document).ready(function(){

// items counter
$('.row-index').each(function( index ) {
    $(this).html(index + 1);
});

// edit item modal function
$( ".edit" ).each(function(index) {
    $(this).on("click", function(e){
        var url = "/items/" + e.target.id + "/edit?order_no={{ $order->id }}";
        $('#modalHeader').html('<div class="col-md-4"></div><div class="col-md-4"><h3 class="modal-title">Edit Item</h3></div><div class="col-md-4 pull-right"><button type="button" class="close" data-dismiss="modal">&times;</button></div>');
        $('.multi-modal-body').html('<img src="{{ asset('img/loading.gif') }}" style="display:block;margin:0 auto;padding:150px 0">');
        $('.multi-modal-body').load(url,function(result){
            $('#myModall2').modal({show:true});
        });
    });
});

// add new item modal function
$('#addNewItem').click(function(){
    var url = "/items/create?order_no={{ $order->id }}";
    $('#modalHeader').html('<div class="col-md-4"></div><div class="col-md-4"><h3 class="modal-title">Add New Item</h3></div><div class="col-md-4 pull-right"><button type="button" class="close" data-dismiss="modal">&times;</button></div>');
    $('.multi-modal-body').html('<img src="{{ asset('img/loading.gif') }}" style="display:block;margin:0 auto;padding:150px 0">');
    $('.multi-modal-body').load(url,function(result){
        $('#addItem').modal({show:true});
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