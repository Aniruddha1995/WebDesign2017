<?php
//Displays the header
include "header.php";

?>

<!--Catalogue-->
<center>
<div>
<img class="catalogue" src="catalogue.png">
</div>
</center>
<br>
<?php

// Prints the day, date, month, year.
echo date("l jS \of F Y ") ."<br>"  ;  
echo"Valid till "; echo date('d-m-Y', strtotime("+1 week"));

?>

<br>
<br>
<?php
//Connect to the database
include "Database_Connection.php";

//Run Select statement
$prodDeal = "Special Item";
$sqlDeal = "SELECT Prod_Photo,Prod_Name,Prod_Price FROM product WHERE Prod_Type= ? ORDER BY Prod_Name ASC";

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
	</td>
	</tr>
	<tr>
		<td colspan="4" valign="bottom" style="background-color: #f2f2f2;">
		<p>Fresh produce Deals is only valid from 7am Monday till Sunday every week. Every week will have different products on specials.</p>
		<p><b>While stocks last.</b></p>
		<p>If you no longer wish to receive emails like this, you can amend your email preferences or unsubscribe by <a href="unsubscribe.php">Click Here</a>. Please note your unsubcription request may take up to 48 hours to process.</p>
		<br>
		</td>
	</tr>
</table>

