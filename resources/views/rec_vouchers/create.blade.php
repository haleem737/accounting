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
                        <h4>Reciept Voucher</h4>
                    </div>

                    <!-- begining of add customer form -->
                    <form action='/receipt_vouchers' method='POST'>
                    {{ csrf_field() }}
                
                        <!-- company -->
                        <div class="form-group">
                            <input id='company_name' type="text" name='company_name' class="form-control chat-input" placeholder="Company Name" />
                        </div> 

                        <!-- Amount -->
                        <div class="form-group">
                            <input type="text" name='amount' class="form-control chat-input" placeholder="Amount" />
                        </div> 

                        <!-- Being for -->
                        <div class="form-group">
                            <input type="text" name='being_for' class="form-control chat-input" placeholder="Being for" />
                        </div> 

                        <!-- Pay Method -->
                        <div class="form-group">
                            <input type="text" name='pay_method' class="form-control chat-input" placeholder="Pay Method" />
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


@section('script')

<script>
$(document).ready(function(){

// using typehahead plugin to search for customer from database
$('#company_name').typeahead({
    highlight: true,
    source: function(query, result){
        $.ajax({
        url:"{{ URL::to('find-customer') }}",
        method:"GET",
        data:{query:query},
        dataType:"json",
        success:function(data)
        {
        result($.map(data, function(customer){
        console.log(customer);
        return customer;
        }));
        }
        })
    }
    });

});
</script>

@endsection('script')

@endsection('content')