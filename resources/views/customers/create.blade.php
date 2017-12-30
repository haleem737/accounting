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

<!-- new customer form -->
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
                <div class="form-new-customer">

                    <div class="form-group">
                        <h4>Add New Customer</h4>
                    </div>

                    <!-- begining of add customer form -->
                    <form action='/customers' method='POST'>
                    {{ csrf_field() }}
                
                        <!-- customer full name -->
                        <div class="form-group">
                            <input type="text" name='full_name' class="form-control chat-input" placeholder="Full Name" />
                        </div> 

                        <!-- company name -->
                        <div class="form-group">
                            <input type="text" name='co_name' class="form-control chat-input" placeholder="Company Name" />
                        </div> 

                        <!-- tel -->
                        <div class="form-group">
                            <input type="text" name='tel' class="form-control chat-input" placeholder="Tel" />
                        </div> 

                        <!-- mobile -->
                        <div class="form-group">
                            <input type="text" name='mobile' class="form-control chat-input" placeholder="Mobile" />
                        </div> 

                        <!-- email -->
                        <div class="form-group">
                            <input type="text" name='email' class="form-control chat-input" placeholder="Email" />
                        </div> 

                        <!-- SUBMIT NEW customer -->
                        <input type='submit' value='APPLY' class='btn btn-success pull-right'>
                        <div class="clearfix"></div>
                        
                    </form>


                </div>

            </div>
        </div>
    </div>
</main>

@endsection('content')