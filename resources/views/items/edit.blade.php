<!-- extend master layout -->
    @extends('layouts.master')

<!-- page title -->
@section('title')
Create New Order
@endsection('title')

<!-- custome css -->
@section('style')

<style>

#page-footer{
display:none;
}

body{
padding-top:50px;
margin:0 6%;
}

</style>

@endsection('style')


<!--Page Content -->
@section('content')

<div class='container'>

    <form method="post" action="{{ route('items.update',[$item->id]) }}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="order_no" value="{{ $item->order_id }}">


        <div class="form-group">
            <label for="description">Description</label>
            <input name='description' type="text" class="form-control" value='{{ $item->description }}' placeholder="">
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="paper">Paper</label>
                <input name='paper' type="text" class="form-control" value='{{ $item->paper }}' placeholder="">
            </div>

            <div class="form-group col-md-6">
                <label for="size">Size</label>
                <input name='size' type="text" class="form-control" value='{{ $item->size }}' placeholder="">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="colors">Colors</label>
                <input name='colors' type="text" class="form-control" value='{{ $item->colors }}' placeholder="">
            </div>

            <div class="form-group col-md-6">
                <label for="copies">copies</label>
                <input name='copies' type="text" class="form-control" value='{{ $item->copies }}' placeholder="">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="serial">Serial</label>
                <input name='serial' type="text" class="form-control" value='{{ $item->serial }}' placeholder="">
            </div>

            <div class="form-group col-md-6">
                <label for="pack">Pack</label>
                <input name='pack' type="text" class="form-control" value='{{ $item->pack }}' placeholder="">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="qty">Qty</label>
                <input name='qty' type="text" class="form-control" value='{{ $item->qty }}' placeholder="">
            </div>

            <div class="form-group col-md-6">
                <label for="price">Price</label>
                <input name='price' type="text" class="form-control" value='{{ $item->price }}' placeholder="">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="cost">Cost</label>
                <input name='cost' type="text" class="form-control" value='{{ $item->cost }}' placeholder="">
            </div>

        </div>

        <div class="form-group pull-right">
            <input type="submit" class="ui primary button" value="SAVE"/>
            <button type="button" class="ui basic button" data-dismiss="modal">Cancel</button>
        </div>

    </form>

</div>

@endsection('content')