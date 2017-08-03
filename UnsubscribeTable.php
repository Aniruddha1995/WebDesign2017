<?php

//Defineing the variables and setting them empty.
$proFName = $proLName = $proEmail = "";

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

$sqlUnsub = "INSERT INTO unsubscribe (Cus_FN,Cus_LN,Cus_Email) VALUES (?,?,?)";


$dbrs = $dbConn->prepare ($sqlUnsub);
$dbrs->execute (array($proFName,$proLName,$proEmail));
header('Location: unsubscribe.php?status=1');

?>