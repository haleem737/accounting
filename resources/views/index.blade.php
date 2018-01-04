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


<!-- test semanatic ui -->
<div class="col-md-3">
    <div class="ui sub header">Single</div>
    <select name="skills" class="ui fluid search dropdown" autocomplete="off">
        <option value="">Skills</option>
        <option value="angular">Angular</option>
        <option value="angular">Anguldfsar</option>
        <option value="angular">Angsfular</option>
    </select>
</div>
@section('script')

<script>
$(document).ready(function(){

$('.ui.dropdown')
    .dropdown();  
});

</script>

@endsection('script')



@endsection('content')