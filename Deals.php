<?php
//Displays the header
include "header.php";

?>
<!--On Specials-->
<div class="specialoffer">
<img class="soffer" src="special_tag.png">
</div>

<div id="pageone">
<table  class="display"  width="1100">
	<tr>
		<td width="150" rowspan="9" valign="top">
		
		<button class="accordion">Fruit</button>
		<div class="panel">
			<li>Apple</li>
			<li>Avacado</li>
			<li>Banana</li>
			<li>Feijoas</li>
			<li>Mangos</li>
			<li>Oranges</li>
			<li>Pear</li>
			
		</div>
		</td>
		<td>
		<button class="accordion">Vegetable</button>
		<div class="panel">
			<li>Asparagus</li>
			<li>Beans</li>
			<li>Broccoli</li>
			<li>Cabbage</li>
			<li>Celery</li>
			<li>Cucumber</li>
			<li>Spanich</li>
		</div>
		</td>
		<td>
		<button class="accordion">Salad</button>
		<div class="panel">
			<li>Broccoslaw</li>
			<li>Coleslaw</li>
			<li>Kale</li>
			<li>Pak Choy</li>
			<li>Ranchslaw</li>
			<li>Spanich</li>
			<li>Sprouts</li>
		</div>
		</td>
	</tr>
</table>
</div>

<!--Page numbers-->
<div class="center">
<div class="pagination">
  <a>Pages:</a>
  <a href="Deals.php">1</a>
  <a href="Deals2.php">2</a>
</div>
</div>

<?php
//Connect to the database and displaying page 1 with 8 rows per page.
include "Database_Connection.php";

//Run Select statement
$prodDeal = "Special Item";
$sqlDeal = "SELECT Prod_Photo,Prod_Name,Prod_Price FROM product WHERE Prod_Type= ? ORDER BY Prod_Name ASC LIMIT 8";

$dbrs = $dbConn->prepare ($sqlDeal);
$dbrs->execute (array($prodDeal));

foreach ($dbrs as $dbrow){
	
				echo "<table class='inblock' border='3px'>";	
					echo "<tr>";
					echo "<td>" . "<img height='180px' width='200px' src='data:image/jpeg;base64,". base64_encode($dbrow['Prod_Photo']) . "'/></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>" . "<img class='deals' src='Deals.png'>. </td>" ;
					echo "</tr>";
					echo "<tr>";
					echo "<td>" . $dbrow['Prod_Name'] . "</td>" ;
					echo "</tr>";
					echo "<tr >";
					echo "<td>" . "$". $dbrow['Prod_Price'] . "</td>";
					echo "</tr>";
				echo "</table>";	

}
?>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
		if (panel.style.maxHeight){
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
    } 
    }
}
</script>


