<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery &amp; Bootstrap Carousel Demo</title>
 <link rel="stylesheet" href="ivandry/css/bootstrap.min.css">
	<!-- custom scrollbar stylesheet -->
	<link rel="stylesheet" href="ivandry/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="ivandry/css/style.css">
	<link rel="stylesheet" href="ivandry/css/ivandry.css">
	<link rel="stylesheet" type="text/css" href="ivandry/css/slidemenu.css" />
		<!-- Google CDN jQuery with fallback to local -->
	<script src="ivandry/js/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="ivandry/js/minified/jquery-1.11.0.min.js"><\/script>')</script>
	
	<!-- MaxCDN Bootstrap plugins -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="ivandry/js/bootstrap.min.js"></script>
</head>

<body>
<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active"> <img src="ivandry/images/1.jpg" style="width:100%" alt="First slide">
      <div>
        <div class="carousel-caption">

        </div>
      </div>
    </div>
    <div class="item"> <img src="ivandry/images/2.jpg" style="width:100%" alt="First slide">
      <div>
        <div class="carousel-caption">

        </div>
      </div>
    </div>
    <div class="item"> <img src="ivandry/images/3.jpg" style="width:100%" alt="First slide">
      <div>
        <div class="carousel-caption">

        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> </div>
</body>
</html>
