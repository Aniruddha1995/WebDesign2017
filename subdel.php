<?php

//Assign variable
$prosubID = $prounsubID = "";

$prosubID = test_input($_POST["subID"]);
$prounsubID = test_input($_POST["unsubID"]);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
 
 //Connect to the database
 include "Database_Connection.php";

 $sqlsubdel = "DELETE FROM subscription WHERE Sub_ID=?";
 $sqlunsubdel = "DELETE FROM unsubscribe WHERE Unsub_ID=?";
 
$dbrs = $dbConn->prepare ($sqlsubdel);
$dbrs->execute (array($prosubID));

$dbrs = $dbConn->prepare ($sqlunsubdel);
$dbrs->execute (array($prounsubID));

header('Location: ManagementSoftware.php?status=17');




?>