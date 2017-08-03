<!-- This page will be called by Contact Us.php only when user has entered all the fields. -->
<?php

//Defineing the variables and setting them empty.
$proFName = $proEmail = $proSubject = $proComments = "";

$proFName = test_input($_POST["firstname"]);
$proEmail = test_input($_POST["email"]);
$proSubject = test_input($_POST["subject"]);
$proComments = test_input($_POST["ycomments"]);

//Checking the user input 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

//Adding the user input into the databse only when it is not empty.
include "Database_Connection.php";

$SQLCreateEnq = "INSERT INTO enquiries (Enq_CusName, Enq_CusEmail, Enq_Subject, Enq_Message) VALUES (?,?,?,?)";

if ((!empty($proFName)) && (!empty($proEmail)) && (!empty($proSubject)) && (!empty($proComments))){
	$dbrs = $dbConn->prepare ($SQLCreateEnq);
	$dbrs->execute (array($proFName,$proEmail,$proSubject,$proComments));
	header('Location: ContactUs.php?status=1');
}



?>




