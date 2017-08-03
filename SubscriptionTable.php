<?php

//Defineing the variables and setting them empty.
$proFName = $proLName = $proEmail = $proStreet = $proSuburb = $proCity = $proState = $proPostcode = $proChecked = "";

$proFName = test_input($_POST["FName"]);
$proLName = test_input($_POST["LName"]);
$proEmail = test_input($_POST["email"]);

//Checking the user input 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

//Adding the user input into the databse only when it is not empty.
include "Database_Connection.php";

$SQLCreateSub  = "INSERT INTO subscription (Cus_FN,Cus_LN,Cus_Email) VALUES (?,?,?)";


if ((!empty($proFName)) && (!empty($proLName)) && (!empty($proEmail))){
	$dbrs = $dbConn->prepare ($SQLCreateSub);
	$dbrs->execute (array($proFName,$proLName,$proEmail));
	header('Location: Subscription.php?status=1');
}

?>
