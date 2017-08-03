<?php
session_start();

//Connect to the database
include "Database_Connection.php";


//Assign variables
$adminUsername = $adminPassword = "";

$adminUsername = test_input($_POST["username"]);
$adminPassword = test_input($_POST["psw"]);

//Checking the user input 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

$sqllogin = "SELECT ID FROM admin WHERE Username=? and Password=?";

$dbrs = $dbConn->prepare ($sqllogin);
$dbrs->execute (array($adminUsername,$adminPassword));

$numrow = $dbrs->rowcount();

if($numrow == 1){
	$_SESSION['login_user'] = $adminUsername;
	header('Location: ManagementSoftware.php');
}else{
	header('Location: login.php?status=1');
}
	

?>