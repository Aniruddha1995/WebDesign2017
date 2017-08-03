<?php

//Assign varaible
$adminUsername = $adminPassword = "";

$adminUsername = test_input($_POST["username"]);
$adminPassword = test_input($_POST["password"]);

//Checking the user input 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
 
//Connect to the database
 include "Database_Connection.php";

 $sqladminadd = "INSERT INTO admin (Username,Password) VALUES (?,?)";
 
$dbrs = $dbConn->prepare ($sqladminadd);
$dbrs->execute (array($adminUsername,$adminPassword));
header('Location: ManagementSoftware.php?status=18');

?>