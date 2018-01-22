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
margin:0 100px;
}
#data-table-header{
margin-bottom:5px;
}
.table-header{
background:#FCAF17;
margin-right:1.3px;
margin-left:1.3px;
padding-top:5px;
padding-bottom:5px;
border: 1px solid #939598;
border-radius: 10px;
}
.table-cell input{
margin:0;
border: 1px solid #939598;
padding:5px 8px;
border-radius: 10px;
}
.table-cell input:focus{
outline: none !important;
border:1px solid red;
box-shadow: 0 0 25px #FCAF17;
}
.table-cell{
padding:0;
margin:3px 1.3px;
}
</style>
@endsection('style')

<!--Page Content -->
@section('content')

<div class='container-fluid'>

    <div class="card" style='margin-bottom:20px'>

        <div class="card-header">

            <h1 align='center'>ORDER NO
                <span style='color:#F37021'><b>#{{$newOrderNum}}</b></span>
                <span><a href='/'<button class="ui negative basic medium button pull-right">cancel</button></a></span>
            </h1>

        </div>
        <div class="card-block" style='padding:40px 0;'>
        
            <div class="row">

                <div class='col-md-3 offset-1'>
                    <!-- search for company name -->
                    <div class="ui header">Company Name</div>
                    <select name="company_name" class="ui massive fluid search dropdown" autocomplete="off">
                    <option value="">search</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->co_name }}">{{ $customer->co_name }}</option>
                    @endforeach
                    </select>
                    <h2 id="choose_company_error_message" style='color:red;display:none;margin-top:0;padding-top:0'>you have to choose company</h2>                         
                </div>

                <!-- P.O. Number -->
                <div class='col-md-3 offset-4'>
                    <div class="ui header">P.O. Number</div>
                    <div class="ui massive car icon input">
                        <input type="text" name="po_no" id="po-no"  autocomplete="off" placeholder="P.O. Number" >
                        <i class="wpforms icon"></i>
                    </div>
                </div>

                <!-- date
                <div class='col-md-3'>
                <h4>Date: {{$date}}</h4>
                </div> -->

            </div>





        </div>
    </div>



    <!-- data table header -->
    <div id='data-table-header' class='row text-center'>

        <div class="col-auto table-header" style='padding-left:1.5em; padding-right:1.5em;'>#</div>
        <div class="col-md-2 table-header">Description</div>
        <div class="col-md-1 table-header">Paper</div>
        <div class="col-md-1 table-header">Size</div>
        <div class="col-md-1 table-header">Color</div>
        <div class="col-md-1 table-header">Copies</div>
        <div class="col-md-1 table-header">Serial</div>
        <div class="col-md-1 table-header">Pack</div>
        <div class="col-md-1 table-header">Qty</div>
        <div class="col-md-1 table-header">Price</div>
        <div class="col-md-1 table-header">Cost</div>

    </div>

    <div class="ui form" >
    <!-- data table inputs form -->
    <form id='form' action='/items' method='POST' style='min-height:200px'>
    {{ csrf_field() }}

        <div id='data-inputs' class='row text-center input-row'>

            <div class="col-auto table-cell item-row" style='padding-right:0;'>

                <!-- <label class="custom-control custom-checkbox">
                    <input name="item-row" type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description row-index"></span>
                </label> -->

                <div class="ui animated button">
                    <span class="visible content row-index"></span>
                    <span class="hidden content delete-my-row"><i class="trash icon"></i></span>
                </div>
                        

            </div>

            <div class="col-md-2 table-cell field">
                <input name="description[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" required>
            </div>

            <div class="col-md-1 table-cell">
                <input name="paper[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

            <div class="col-md-1 table-cell">
                <input name="size[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

            <div class="col-md-1 table-cell">
                <input name="colors[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

            <div class="col-md-1 table-cell">
                <input name="copies[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

            <div class="col-md-1 table-cell">
                <input name="serial[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

            <div class="col-md-1 table-cell">
                <input name="pack[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

            <div class="col-md-1 table-cell">
                <input name="qty[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

            <div class="col-md-1 table-cell field">
                <input name="price[]" type="number" step="any" class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            </div>

                <div class="col-md-1 table-cell">
                <input name="cost[]" type="number" step="any" class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
            

                <div id='add-new-row' class="ui circular animated green basic button" style='position:absolute;right:-73px;top:0px'>
                    <span class="visible content"><i class="plus icon"></i></span>
                    <span id='delete' class="hidden content"><i class="plus icon"></i></span>
                </div>

            </div>


        </div>

        <input id='hidden_submit' type='submit' style='display:none'>  
        <input class="field" type='hidden' name='copy_company_name' autocomplete="off">
        <input type='hidden' name='copy_po_no' autocomplete="off">
        
    </form>


    </div>

    <!-- Total Table -->
    <div class="row">
        <div class="col-md-3 offset-9">
        
            <table class="table table-bordered">

                <tr>
                    <td align='right'>Total Price</td>
                    <td><span id='totalPrice'>0</span></td>
                    <td></td>
                </tr>
            
                <tr>
                    <td align='right'>VAT(5%)</td>
                    <td><span id='totalVAT'>0</span></td>
                    <td></td>
                </tr>
            
                <tr>
                    <td align='right'>Total W VAT</td>
                    <td><span id='totalWithVAT'>0</span></td>
                    <td>Total Cost: <span id='totalCost'>0</span></td>
                </tr>
            
            </table>
        
        </div>    
    </div>

    <!-- apply order or cancel -->
    <div class='container text-center'>
        <div class="row">
            <div class="col-md-12">
                <button id='submit' type='submit' class="ui massive olive button">Save</button>
            </div>
        </div>
    </div>

</div>




<!-- script -->
@section('script')


<script>
// calculate (total price - total VAT - total price with VAT)
function calculateTotalPrice() {
    var totalPrice = 0;
    var totalVat = 0;
    var totalWithVAT = 0;
    //iterate through each textboxes and add the values
    $('[name="price[]"]').each(function() {
        //add only if the value is number
        if(!isNaN(this.value) && this.value.length!=0) {
            totalPrice += parseFloat(this.value);
            totalVat = totalPrice * .05;
            totalWithVAT = totalPrice + totalVat;
        }
    });
    //.toFixed() method will roundoff the final totalPrice to 2 decimal places
    $("#totalPrice").html(totalPrice.toFixed(2));
    $("#totalVAT").html(totalVat.toFixed(2));
    $("#totalWithVAT").html(totalWithVAT.toFixed(2));
}
// calculate total cost
function calculateTotalCost() {
    var totalCost = 0;
    //iterate through each textboxes and add the values
    $('[name="cost[]"]').each(function() {
        //add only if the value is number
        if(!isNaN(this.value) && this.value.length!=0) {
            totalCost += parseFloat(this.value);
        }
    });
    //.toFixed() method will roundoff the final totalCost to 2 decimal places
    $("#totalCost").html(totalCost.toFixed(2));
}
$(document).ready(function(){

// disable back for this page after creating the order
window.history.forward(1);


// use calculateTotalPrice function to calculate (total price - total VAT - total price with VAT)
$(document).on(' keyup change', '[name="price[]"]', function(){
    $('[name="price[]"]').each(function() {
        $(this).keyup(function(){
            calculateTotalPrice();
        });
    });
});
// use calculateTotalCost function to calculate total cost
$(document).on(' keyup', '[name="cost[]"]', function(){
    $('[name="cost[]"]').each(function() {
        $(this).keyup(function(){
            calculateTotalCost();
        });
    });
});
// get selected company name from dropdown and copy it to hidden input (copy_company_name to use with the form
$('.ui.dropdown')
    .dropdown({
        onChange: function(value){
            $('[name="copy_company_name"]').val(value);
            $('#choose_company_error_message').css('display' , 'none');
        },
        forceSelection: false,
        fullTextSearch: true
    });
});
// get po number from po_no input value and copy it to hidden input (copy_po_no name to use with the form
$('[name="po_no"]').bind("keyup change", function(e) {
    $('[name="copy_po_no"]').val($(this).val());
})
// check if one option selected from company name dropdown (if not show error message)
$('form').submit(function(){
    if($('[name="copy_company_name"]').val() == ""){
        $('#choose_company_error_message').css('display' , 'block');
        return false
    }
    return true;
});
// form validation
$( ".ui.form" ).form({
    inline  : true,
    fields: {
        copy_company_name: {
            inline : true,
            identifier : "copy_company_name",
            rules: [{
                type : "empty",
                prompt : 'Please enter your first name'
            }]
        },
    },
    onSuccess: function() {
        console.log( "success" );
    }
});
// fire funtion whine #submit button clicked
$('#submit').on('click',function(){
    $('#hidden_submit').trigger('click');
});
 // table data control functions (add row. delete row)
 // set first input row index
 var row_index = 1;
 $('.row-index').each(function( index ) {
     $(this).html(index + 1);
 });
 
 // total of input rows
 var total_ipnut_rows = 1;
// add new input row with shortcut crtl + arrwo down
$(document).keydown(function(e) {
    
    if(e.ctrlKey && e.which == 40) {
        row_index++;
        $("#data-inputs").clone().appendTo("form").find(".clear-input:input[type='number'] , .clear-input:input[type='text']").val("");
        // reset input rows index
        $('.row-index').each(function( index ) {
            $(this).html(index + 1);
        });
    }
});
// add new input row when click on #add-new-item
$('#add-new-row').on('click', function() {
    row_index++;
    
    $("#data-inputs").clone().appendTo("form").find(".clear-input:input[type='number'] , .clear-input:input[type='text']").val("");
    // reset input rows index
    $('.row-index').each(function( index ) {
        $(this).html(index + 1);
    });
});
// delete input row when click on .delete-my-row
$(document).on('click', '.delete-my-row', function() {
    var input_row_index = $(".delete-my-row").index(this);
    // don't remove if there is only one input row
    if($('.input-row').length != 1){
        $('.input-row').eq(input_row_index).remove();
        // reset input rows index
        $('.row-index').each(function( index ) {
            $(this).html(index + 1);
        });
        calculateTotalPrice();        
    
    }
});
</script>



@endsection('script')

@endsection('content')