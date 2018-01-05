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
background:#f1f1f1;
}

#controls{
margin-left:50px;
margin-bottom:10px;
}

a[name=delete]{
padding:10px;
background:lightgray;
color:black;
}

a[name=delete]:hover{
padding:10px;
background:darkgray;
color:white;
}

a[name=add-row]{
padding:10px;
background:lightgray;
color:black;
}

a[name=add-row]:hover{
padding:10px;
background:darkgray;
color:white;
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

#submit{
margin-bottom:100px;
}

</style>
@endsection('style')

<!--Page Content -->
@section('content')

<div class='container-fluid'>

  <!-- order no -->
  <div class='row' id='order_no'>
      <div class='col-md-12'>
          <h1 align='center'>JOB ORDER NO <span style='color:#F37021'><b>#{{$newOrderNum}}</b></span></h1>
      </div>
  </div>

  <div class='row' id='header'>

      <div class='col-md-12'>
      
          <div class='col-md-3 field'>

            <!-- search for company name -->
            <!-- <div class="ui header">select</div> -->
            <select name="company_name" class="ui fluid search dropdown" autocomplete="off">
                <option value="">Company Name</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->co_name }}">{{ $customer->co_name }}</option>
                @endforeach
            </select>
              <h2 id="choose_company_error_message" style='color:red;display:none;margin-top:0;padding-top:0'>you have to choose company</h2>                         
          </div>
      </div>
      
      <div class='col-md-12'>

      <!-- P.O. Number -->
        <div class='col-md-3'>
            <div class="form-group">
                <input type="text" name="po_no" id="po-no" class="form-control form-control-lg" autocomplete="off" placeholder="P.O. Number" />
            </div>
        </div>
      </div>

      <!-- date
      <div class='col-md-3'>
          <h4>Date: {{$date}}</h4>
      </div> -->

  </div>

  <!-- data table controls -->
  <div class='text-left' id='controls'>
      <a href='#' name='add-row' class="control fa fa-plus fa-lg btn-md"> ADD</a>
      <a href='#' name='delete' class="control fa fa-trash fa-lg btn-md"> DEL</a>
  </div>

  <!-- data table header -->
  <div id='data-table-header' class='row text-center' style='margin-right:20px;margin-left:50px'>

      <div class="col-auto table-header" style='padding-left:26px; padding-right:26px;'>#</div>
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
<div class="ui form">
  <!-- data table inputs form -->
  <form id='form' action='/items' method='POST'>
  {{ csrf_field() }}

    <div id='data-inputs' class='row text-center input-row' style='margin-right:20px;margin-left:50px'>

          <div class="col-auto table-cell item-row" style='padding-left:15px; padding-right:0;'>

              <label class="custom-control custom-checkbox">
                  <input name="item-row" type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description row-index"></span>
              </label>

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
            <input name="color[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
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
          </div>

    </div>

    <input id='hidden_submit' type='submit' style='display:none'>  
    <input class="field" type='hidden' name='copy_company_name' autocomplete="off">
    <input type='hidden' name='copy_po_no' autocomplete="off">
  </form>
  </div>

    <!-- footer -->
    <div class="fixed-bottom">

        <div class='row'>
            <div class='col-md-12 text-center'>
                <input id='submit' type='submit' value='APPLY' class='btn btn-success'>
                <a href='/'>cancel</a>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>


</div>

<!-- script -->
@section('script')


<script>
$(document).ready(function(){

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

$('form').submit(function(){
    if($('[name="copy_company_name"]').val() == ""){
        $('#choose_company_error_message').css('display' , 'block');
        return false
    }
    return true;
});

// get selected company name from dropdown and copy it to hidden input (copy_company_name to use with the form
$('.ui.dropdown')
    .dropdown({
        onChange: function(value){
            $('[name="copy_company_name"]').val(value);
            $('#choose_company_error_message').css('display' , 'none');
        },
        forceSelection: false
    });
});

// get po number from po_no input value and copy it to hidden input (copy_po_no name to use with the form
$('[name="po_no"]').bind("keyup change", function(e) {
    $('[name="copy_po_no"]').val($(this).val());
})
 
 // table data control functions (add row. delete row)
 // set first inputs row index
 var row_index = 1;
 $('.row-index').each(function( index ) {
     $(this).html(index + 1);
 });
 // total of input rows
 var total_ipnut_rows = 1;
 // define action var to apply a function when control button clicked
 var action;
 // check the clicked buttion & fire the required function
 $(document).on('click', '.control' ,function() {
 
     action = $(this).attr('name');
 
     // add row buttion is clicked
     if(action == 'add-row'){
         
         row_index++;
 
         $("#data-inputs").clone().insertAfter("#data-inputs").find(".clear-input:input[type='text']").val("");
 
         // reset input rows index
         $('.row-index').each(function( index ) {
             $(this).html(index + 1);
         });
 
         // enable delete inpts row button
         total_ipnut_rows++;
         $('[name="delete"]').prop('disabled', false);
     }
 
     // remove row buttion is clicked
     if(action == 'delete'){
 
 
         if($('.row-index').length == 1){
             return $('[name="delete"]').prop('disabled', true);
         }
             
         // remove inputs row
         $('.input-row').has('input[name="item-row"]:checked').remove();
 
         // reset input rows index
         $('.row-index').each(function( index ) {
             $(this).html(index + 1);
         });
         row_index = $('.row-index').length;
     }
 });    

</script>



@endsection('script')

@endsection('content')