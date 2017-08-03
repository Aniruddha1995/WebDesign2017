<?php
//Displays the header
include "header.php";

?>

<center>
<!--Special Offer Image on Home page-->
<div>
<img class="Weekend" src="weekend.jpg">
</div>

<!--Automatic Slideshow-->
<div class="Slideshow-container">

<?php

include "Database_Connection.php";

$proSpecial="Special Item";				
$sqlPic = "SELECT Prod_Photo, Prod_Price FROM product WHERE Prod_Type =?";

$dbrs = $dbConn->prepare ($sqlPic);
$dbrs->execute (array($proSpecial));
		
foreach($dbrs as $dbrow)
		  {
		echo "<table border='2' class='SpecialOffer' >";
		   echo "<tr>";
		  echo "<td>" . "<img height='250px' width='300px' src='data:image/jpeg;base64,". base64_encode($dbrow['Prod_Photo']) . "'/></td>";
		  echo "</tr>";
		  echo "<tr>";
		  echo "<td>" . "$". $dbrow['Prod_Price'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
		echo "<br>";
		echo "<br>";

?>

</div>
</center>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("SpecialOffer");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>
</body>
</html>