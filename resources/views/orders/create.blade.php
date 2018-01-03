<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Create New Order
@endsection('title')

<!-- custome css -->
@section('style')
<style>
/* add style for dropdown customer search results */
.active{background:skyblue}
.dropdown-item:hover{background:skyblue}

body{
background:#f1f1f1;
}

#order_no{
margin:60px;
}

#header{
margin-bottom:30px;
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

#table-header{
background:#8e9999;
color:white;
line-height:50px;
font-size:1.2em;
font-weight: normal;
border-bottom: 5px solid #f1f1f1;
}

</style>
@endsection('style')

<!--Page Content -->
@section('content')

<div class='container-fluid'>

  <!-- order no -->
  <div class='row' id='order_no'>
      <div class='col-md-12'>
          <h2 align='center'>JOB ORDER NO <span style='color:red'><b>#{{$newOrderNum}}</b></span></h2>
      </div>
  </div>

  <div class='row' id='header'>

      <div class='col-md-7 offset-1'>

          <!-- search customer name -->
          <div class='col-md-7'>
              <div class="form-group">
                  <label for="formGroupExampleInput"><h4>Company Name</h4></label>
                  <input type="text" name="company_name" id="company_name" class="form-control form-control-lg" autocomplete="off" placeholder="search" />
              </div>
          </div>

      </div>

      <!-- date -->
      <div class='col-md-3'>
          <h4>Date: {{$date}}</h4>
      </div>

  </div>

  <!-- data input table controls -->
  <div class='text-left' id='controls'>
      <a href='#' name='add-row' class="control fa fa-plus fa-lg btn-md"> ADD</a>
      <a href='#' name='delete' class="control fa fa-trash fa-lg btn-md"> DEL</a>
  </div>

  <div class='row text-center' style='padding:0 50px'>

      <div class="col-md-1">#</div>
      <div class="col-md-2">Description</div>
      <div class="col-md-1">Paper</div>
      <div class="col-md-1">Size</div>
      <div class="col-md-1">Color</div>
      <div class="col-md-1">Copies</div>
      <div class="col-md-1">Serial</div>
      <div class="col-md-1">Pack</div>
      <div class="col-md-1">Qty</div>
      <div class="col-md-1">Price</div>
      <div class="col-md-1">Cost</div>

  </div>

  <!-- order items form -->
  <form action='/items' method='POST'>
  {{ csrf_field() }}

    <div id='data-inputs' class='row text-center input-row' style='padding:0 50px'>

          <div class="col-md-1">

              <label class="custom-control custom-checkbox">
                  <input name="item-row" type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description row-index"></span>
              </label>

          </div>

          <div class="col-md-2">
            <input name="description[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="paper[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="size[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="color[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="copies[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="serial[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="pack[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="qty[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="price[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1">
            <input name="cost[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

    </div>


    <input type='hidden' name='copy_company_name'>

  </form>

  <input id='submit' type='submit' value='APPLY' class='btn btn-success pull-right'>
  <div class="clearfix"></div>

    <!-- footer -->
    <div class="fixed-bottom">fotter here</div>


</div>

<!-- script -->
@section('script')

<script>
 $(document).ready(function() {
    
 


 // using typehahead plugin to search for customer from database
$('#company_name').typeahead({
   highlight: true,
   source: function(query, result){
         $.ajax({
            url:"{{ URL::to('find-customer') }}",
            method:"GET",
            data:{query:query},
            dataType:"json",
            success:function(data){
                result($.map(data, function(customer){
                return customer;
                }));
            }
         })
    }
});
 
 // input data table functions
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
 
         $("#data-inputs").clone().appendTo("form").find(".clear-input:input[type='text']").val("");
 
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
             return false;
             $('[name="delete"]').prop('disabled', true);
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

$("#company_name").bind("keyup change", function(e) {
    $('[name="copy_company_name"]').val($(this).val());

})

 $('#submit').on('click',function(){
    $('form').submit();
 });
    


 });
 </script>

@endsection('script')

@endsection('content')