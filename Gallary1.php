<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
div.gallery {
  margin: 5px;
  border: 1px solid black;
  float: left;
  width: 180px;
}
div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body style="background-color:mediumseagreen";>
  <h1 style="text-align:center;color:white"><em>Photo Gallary<em></h1>

<div class="gallery">
  <a target="_blank" href="laxary1.jpg">
    <img src="laxary1.jpg" alt="Luxury Room" width="600" height="400">
  </a>
  <div class="desc">$45 Book Now</div>
</div>

<div class="gallery">
  <a target="_blank" href="laxary2.jpg">
    <img src="laxary2.jpg" alt="Delux Room" width="600" height="400">
  </a>
  <div class="desc">$45 Book Now</div>
</div>

<div class="gallery">
  <a target="_blank" href="laxary3.jpg">
    <img src="laxary3.jpg" alt="Delux Room" width="600" height="400">
  </a>
  <div class="desc">$40   Book Now</div>
</div>

<div class="gallery">
  <a target="_blank" href="single2.jpg">
    <img src="single2.jpg" alt="Single Room" width="600" height="350">
  </a>
  <div class="desc">$25  Book Now</div>
</div>

<div class="gallery">
  <a target="_blank" href="laxary4.jpg">
    <img src="laxary4.jpg" alt="Single Room" width="600" height="350">
  </a>
  <div class="desc">$30   Book Now</div>
</div>


<div class="gallery">
  <a target="_blank" href="laxary5.jpg">
    <img src="laxary5.jpg" alt="Double Room" width="600" height="350">
  </a>
  <div class="desc">$30   Book Now</div>
</div>


 <div class="gallery">
  <a target="_blank" href="single3.jpg">
    <img src="single3.jpg" alt="Single Room" width="600" height="350">
  </a>
  <div class="desc">$25   Book Now</div>

</div>

<?php
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  include('footer.php');
?>


 



</body>
</html>