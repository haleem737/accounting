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

    <form method="post" action="{{ '/item-add' }}">
        {{ csrf_field() }}

        <input type="hidden" name="order_no" value="{{$order_no}}">

        <div class="form-group">
            <label for="description">Description</label>
            <input name='description' type="text" class="form-control" required>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="paper">Paper</label>
                <input name='paper' type="text" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="size">Size</label>
                <input name='size' type="text" class="form-control">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="colors">Colors</label>
                <input name='colors' type="text" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="copies">copies</label>
                <input name='copies' type="text" class="form-control">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="serial">Serial</label>
                <input name='serial' type="text" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="pack">Pack</label>
                <input name='pack' type="text" class="form-control">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="qty">Qty</label>
                <input name='qty' type="text" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="price">Price</label>
                <input name='price' type="text" class="form-control">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="cost">Cost</label>
                <input name='cost' type="text" class="form-control">
            </div>

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="SAVE"/>
        </div>

    </form>

</div>

@endsection('content')