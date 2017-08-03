<?php

//assigning variables to the user input.
$proID = test_input($_POST["productid"]);
$proRating = test_input($_POST["rating"]);
$proProductOf = test_input($_POST["productof"]);
$proKgEach = test_input($_POST["kgoreach"]);
$proCat = test_input($_POST["cat"]);
$proCatUpdate= ($_POST["radiocat"]);

//Checking the user input 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

 //Connecting to the database and create rows, update rows and delete rows in the Fruit, Vegetable and Salad tables.

include "Database_Connection.php";

//Running the insert into sql script
$sqlCreateF = "INSERT INTO fruit (Prod_ID, Ratings, Product_Of, Kg_or_Each) VALUES (?,?,?,?)";
$sqlCreateV = "INSERT INTO vegetable (Prod_ID, Ratings, Product_Of, Kg_or_Each) VALUES (?,?,?,?)";
$sqlCreateS = "INSERT INTO salad (Prod_ID, Ratings, Product_Of, Kg_or_Each) VALUES (?,?,?,?)";

//Running the update sql script
$sqlUpdateF= "UPDATE fruit SET Ratings=?, Product_Of=?, Kg_or_Each=? WHERE Prod_ID=?";
$sqlUpdateV= "UPDATE vegetable SET Ratings=?, Product_Of=?, Kg_or_Each=? WHERE Prod_ID=?";
$sqlUpdateS= "UPDATE salad SET Ratings=?, Product_Of=?, Kg_or_Each=? WHERE Prod_ID=?";

//Running the delete sql script
$sqlDeleteF="DELETE FROM fruit WHERE Prod_ID=?";
$sqlDeleteV="DELETE FROM vegetable WHERE Prod_ID=?";
$sqlDeleteS="DELETE FROM salad WHERE Prod_ID=?";

//Creates in the fruit table
if ($proCatUpdate=='Create Item'){
	if ($proCat=='Fruit'){
		$dbrs = $dbConn->prepare ($sqlCreateF);
		$dbrs->execute (array($proID,$proRating,$proProductOf,$proKgEach));
		header('Location: ManagementSoftware.php?status=4');}	
		
}
//Creates in the Vegetable table
if ($proCatUpdate=='Create Item'){
		if ($proCat=='Vegetable'){
			$dbrs = $dbConn->prepare ($sqlCreateV);
			$dbrs->execute (array($proID,$proRating,$proProductOf,$proKgEach));
			header('Location: ManagementSoftware.php?status=5');
			}
}
//Creates in the salad table
if ($proCatUpdate=='Create Item'){
		if ($proCat=='Salad'){
			$dbrs = $dbConn->prepare ($sqlCreateS);
			$dbrs->execute (array($proID,$proRating,$proProductOf,$proKgEach));
			header('Location: ManagementSoftware.php?status=6');
			}			
}


//Updates the fruit table
if ($proCatUpdate=='Update Item'){
		if ($proCat=='Fruit'){
			$dbrs = $dbConn->prepare ($sqlUpdateF);
			$dbrs->execute (array($proRating,$proProductOf,$proKgEach,$proID));
			header('Location: ManagementSoftware.php?status=7');
			}			
}
//Updates the Vegetable table
if ($proCatUpdate=='Update Item'){
		if ($proCat=='Vegetable'){
			$dbrs = $dbConn->prepare ($sqlUpdateV);
			$dbrs->execute (array($proRating,$proProductOf,$proKgEach,$proID));
			header('Location: ManagementSoftware.php?status=8');
			}			
}
//Updates the Salad table
if ($proCatUpdate=='Update Item'){
		if ($proCat=='Salad'){
			$dbrs = $dbConn->prepare ($sqlUpdateS);
			$dbrs->execute (array($proRating,$proProductOf,$proKgEach,$proID));
			header('Location: ManagementSoftware.php?status=9');
			}			
}


//This deletes the row in fruit table.
if ($proCatUpdate=='Delete Item'){
		if ($proCat=='Fruit'){
			$dbrs = $dbConn->prepare ($sqlDeleteF);
			$dbrs->execute (array($proID));
			header('Location: ManagementSoftware.php?status=10');
			}			
}
//This deletes the row in vegetable table.
if ($proCatUpdate=='Delete Item'){
		if ($proCat=='Vegetable'){
			$dbrs = $dbConn->prepare ($sqlDeleteV);
			$dbrs->execute (array($proID));
			header('Location: ManagementSoftware.php?status=11');
			}			
}
//This deletes the row in salad table.
if ($proCatUpdate=='Delete Item'){
		if ($proCat=='Salad'){
			$dbrs = $dbConn->prepare ($sqlDeleteS);
			$dbrs->execute (array($proID));
			header('Location: ManagementSoftware.php?status=12');
			}			
}

?>