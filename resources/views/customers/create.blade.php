<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Create New Order
@endsection('title')

<!-- custome css -->
@section('style')

<style>
html, body{
height: 100%;
}
/* body { 
background-image: url('https://i.imgur.com/WiE0oXP.png') ;
background-position: center center;
background-repeat:  no-repeat;
background-attachment: fixed;
background-size:  cover;
background-color: #999;

} */

body{
background:#f4f4f4;
}

div, body{
margin: 0;
padding: 0;
font-family: exo, sans-serif;

}
.wrapper {
height: 100%; 
width: 100%; 
}

.message {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
width: 100%; 
height:100%;
bottom: 0; 
display: block;
position: absolute;
background-color: rgba(0,0,0,0.5);
color: #fff;
padding: 0.5em;
}

.input{
margin-bottom:10px;
}


</style>

@endsection('style')


<!--Page Content -->
@section('content')

<!-- <div class="wrapper">
  <div class="message">
  </div>
</div> -->


<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 ui huge form">

            <form action='/customers' method='POST' style='background:white;padding:50px 0;margin-top:80px;border-radius: 15px;'>
            {{ csrf_field() }}
            
                <div class="input col-md-10 offset-1">
                    <h1 align='center'>Add New Customer</h1>
                </div>

                <!-- customer full name -->
                <div class="input col-md-10 offset-1">
                    <input type="text" name='full_name' class="massive" placeholder="Full Name" autocomplete="off" required/>
                </div>

                <!-- company name -->
                <div class="input col-md-10 offset-1">
                    <input type="text" name='co_name' class="massive" placeholder="Company Name" autocomplete="off" required/>
                </div>

                <!-- Tel. -->
                <div class="input col-md-10 offset-1">
                    <input type="text" name='tel' class="massive" placeholder="Tel" autocomplete="off" required/>
                </div>

                <!-- Mobile -->
                <div class="input col-md-10 offset-1">
                    <input type="text" name='mobile' class="massive" placeholder="Mobile" autocomplete="off" required/>
                </div>

                <!-- E-mail -->
                <div class="input col-md-10 offset-1" style='margin-bottom:40px'>
                    <input type="text" name='email' class="massive" placeholder="E-mail" autocomplete="off" required/>
                </div>

                <div class="input col-md-10 offset-1" align='center'>
                    <button id='submit' type='submit' class="ui massive olive button">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>


@include('layouts.footer')

@endsection('content')