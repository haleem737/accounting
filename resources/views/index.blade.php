<!DOCTYPE html>
<html>
<title>TAWFIQ PRINTERS</title>
<style>
body, html {
    height: 100%;
    margin: 0;
}

*{padding: 0; margin: 0}

.bgimg {
    background-image: url('/w3images/forestbridge.jpg');
    height: 100%;
    background-position: center;
    background-size: cover;
    position: relative;
    font-family: "Courier New", Courier, monospace;
    font-size: 25px;
}

.topleft {
    position: absolute;
    top: 0;
    left: 16px;
}

.bottomleft {
    position: absolute;
    bottom: 0;
    left: 16px;
}

.middle {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

hr {
    margin: auto;
    width: 40%;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
  </div>
  <div class="middle">
    <img src="{{ asset('img/logo.png') }}">
    <h3 style="color: #999999">TAWFIQ PRINTERS</h3>
    <hr style="margin-top: 15px">
    <h1 style="">COMING SOON</h1>
  </div>
  <div class="bottomleft">
  </div>
</div>

</body>
</html>