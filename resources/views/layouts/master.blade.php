<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<!-- bootstrap css  -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">

<!-- online icons and fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>

<!-- semantic ui css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">

<!-- semantic ui icons  -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">.


<!-- style -->
<style type='text/css'>
</style>

<!-- custome style -->
@yield('style')

</head>

<body>

@include('partials.errors')
@include('partials.success')
@yield('content')





<!-- Scripts -->
<!-- jquery js -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- bootstrap js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

<!-- semantic ui js -->
<script src="{{ asset('js/semantic.min.js') }}"></script>

<!-- jquery typehead plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


<!-- side bar menu srcript -->
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
$('#message').delay(2500).fadeOut("slow");
var moveToLeft = 50 - (($("#message").width()) / ($('#message').parent().width()) * 100) / 2;
$('#message').css('left' , moveToLeft + '%');
</script>



@yield('script')
<!-- @include('layouts.footer') -->

</body>
</html>
