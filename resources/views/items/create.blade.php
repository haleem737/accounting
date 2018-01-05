<!-- extend master layout -->
@extends('layouts.master')


@section('content')


<h1>This is a test form for Semantic UI</h1>

<form class="ui form segment col-md-3" action='https://www.google.com/'>


    <div class="field">
        <label>Field 2</label>
        <input name="test[]" type="text" placeholder="just for test..." autocomplete='off' required>
    </div>

    <div class="field">
        <label>Field 2</label>
        <input name="test[]" type="text" placeholder="just for test..." autocomplete='off' required>
    </div>

    <div class="field">
    <label>Dropdown</label>
    <select class="ui dropdown" name="dropdown">
      <option value="">Select</option>
      <option value="male">Choice 1</option>
      <option value="female">Choice 2</option>
    </select>
  </div>


    <input type='submit'>
    <div class="ui submit button">Submit</div>


</form>

<div class="ui container">
    <div class="ui animated button">
        <span class="visible content">Next</span>
        <span id='delete' class="hidden content"><i class="trash icon"></i></span>
    </div>
</div>

<div class="ui labeled button" tabindex="0">
  <div class="ui button">
    <i class="heart icon"></i> Like
  </div>
  <a class="ui basic label">
    2,048
  </a>
</div>
@section('script')
<script>

$(document).ready(function(){

$('#delete').on('click' , function(){
    $("<input name='test[]' type='text' required>").appendTo('form');
});

$('h1').on('click' , function(){
    $("<input name='test[]' type='text' required>").appendTo('form');
});

// form validation
$( ".ui.form" ).form({
    inline  : true,
    fields: {
            test: {
            identifier : "test[]",
            rules: [{
                type : "empty",
                prompt : 'Please enter for test field'
            }]
        },

        dropdown: {
        identifier  : 'dropdown',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please select a dropdown value'
          }
        ]
      },

    },
    onSuccess: function() {
    }
});





});    

</script>

@endsection('script')



@endsection('content')