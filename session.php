<?php

include "Database_Connection.php";
session_start();

$user_check =$_SESSION['login_user'];

$sqlsession = "SELECT Username From admin WHERE Username = ? ";

$dbrs = $dbConn->prepare ($sqlsession);
$dbrs->execute (array($user_check));

foreach ($dbrs as $dbrow){
	$login_session = $dbrow['Username'];
	

	if(!isset($_SESSION['login_user'])){
		header("location:login.php");}
}
?>