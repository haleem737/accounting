<style>
#open-side-nav{
    position:absolute;
    left:40px;
    top:50px;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #393939;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
    margin:0;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>


<div id="app">
<div class="container">

<div class="navbar-header">

<!-- Branding Image -->
<div id="mySidenav" class="sidenav">

<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<!-- <a class="" href="{{ url('/') }}">HOME</a> -->
@guest
<li><a href="{{ route('login') }}">Login</a></li>
<li><a href="{{ route('register') }}">Register</a></li>
@else
<!-- {{ Auth::user()->name }} <span class="caret"></span> -->
<a class="" href="{{ url('/home') }}">HOME</a>
<a class="" href="{{ url('/orders') }}">ORDERS</a>
<a href="{{ route('logout') }}"
onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>

@endguest

</div>

<span id='open-side-nav' style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


</div>





<div class="" id="">

<!-- Authentication Links -->

</div>
</div>
</div>
