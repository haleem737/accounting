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

.card{
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  -webkit-user-select: none; /* Safari */        
  -moz-user-select: none; /* Firefox */
  -ms-user-select: none; /* IE10+/Edge */
  user-select: none; /* Standard */
}


.card:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}




</style>

@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <div class="row">
    
        <div class="card-columns text-center">

            <!-- Card 1 -->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h2>NEW CUSTOMER</h2>
                    </div>
                    <a href='/customers/create'><p class="card-text"><i class="large Add User icon"></i></p></a>
                </div>
            </div>
            
            <!-- Card 1 -->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h2>NEW ORDER</h2>
                    </div>
                    <a href='/orders/create'><p class="card-text"><i class=" large File Text icon"></i></p></a>
                </div>
            </div>
            
            <!-- Card 1 -->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h2>VIEW ORDERS</h2>
                    </div>
                    <a href='/orders'><p class="icon-link card-text"><i class=" large Calendar icon"></i></p></a>
                </div>
            </div>
            


        </div>
   
    </div>
        
</div>


@include('partials.sidebar')




@endsection('content')
