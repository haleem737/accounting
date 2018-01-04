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
          <h3 align='center'>JOB ORDER NO <span style='color:#F37021'><b>#{{$newOrderNum}}</b></span></h3>
      </div>
  </div>

  <div class='row' id='header'>

      <div class='col-md-12'>
          <!-- search customer name -->
      </div>
    
      <div class='col-md-12'>
          <!-- search customer name -->
          <div class='col-md-3'>

            <div class="ui sub header">Single</div>
            <select name="company_name" class="ui fluid search dropdown" autocomplete="off">
                <option value="">Skills</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->co_name }}">{{ $customer->co_name }}</option>
                @endforeach
            </select>
                                       
          </div>
      </div>
      
      <div class='col-md-12'>

      <!-- Add P.O. Number -->
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

  <!-- data input table controls -->
  <div class='text-left' id='controls'>
      <a href='#' name='add-row' class="control fa fa-plus fa-lg btn-md"> ADD</a>
      <a href='#' name='delete' class="control fa fa-trash fa-lg btn-md"> DEL</a>
  </div>

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

  <!-- order items form -->
  <form action='/items' method='POST'>
  {{ csrf_field() }}

    <div id='data-inputs' class='row text-center input-row' style='margin-right:20px;margin-left:50px'>

          <div class="col-auto table-cell item-row" style='padding-left:15px; padding-right:0;'>

              <label class="custom-control custom-checkbox">
                  <input name="item-row" type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description row-index"></span>
              </label>

          </div>

          <div class="col-md-2 table-cell">
            <input name="description[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
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

          <div class="col-md-1 table-cell">
            <input name="price[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

          <div class="col-md-1 table-cell">
            <input name="cost[]" type='text' class='col-md-12 form-control form-control-lg clear-input' autocomplete="off" >
          </div>

    </div>


    <input type='hidden' name='copy_company_name'>
    <input type='hidden' name='copy_po_no'>

  </form>


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

$('.ui.dropdown')
    .dropdown({
        forceSelection: false
    });
});

//  $('.item-row').hover(function(){
//      $(this).html('asfsdf');
//  });

 // using typehahead plugin to search for customer from database
 $('[name="company_name"]').typeahead({
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

$('[name="company_name"]').bind("keyup change", function(e) {
    $('[name="copy_company_name"]').val($(this).val());
})

$('[name="po_no"]').bind("keyup change", function(e) {
    $('[name="copy_po_no"]').val($(this).val());
})

 $('#submit').on('click',function(){
     alert(copy_company_name);
    // $('form').submit();
 });
    


</script>



@endsection('script')

@endsection('content')