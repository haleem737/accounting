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
<form action="">
First name: <input type="text" name="FirstName" value="Mickey"><br>
Last name: <input type="text" name="LastName" value="Mouse"><br>
<input type="submit" value="Submit">
</form> 



@section('script')

<script>

$(document).ready(function(){
    $("form").submit(function(){
        alert("Submitted");
    });
});

</script>

@endsection('script')

@endsection('content')