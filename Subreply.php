<?php

$host = $_SERVER['HTTP_HOST'];

$SubID = $_POST["subID"];
$to = $_POST["subemail"];
$subject = $_POST["subject"];
$body = file_get_contents("http://" . $host . "/Catalogue.php");

$header = "From: khadija.b.khan@gmail.com \r\n";
$header .= "Mail_MIME-Version: 1.10.1\r\n";
$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to,$subject,$body,$header);

//Connection to database and updating the table.
include "Database_Connection.php";

//Updating the subscription table
$sqlUpdateSub = "UPDATE subscription SET Catalogue = ? WHERE Sub_ID = ?";

$dbrs = $dbConn->prepare ($sqlUpdateSub);
$dbrs->execute (array($subject,$SubID));

//Redirecting to the main page.
header('Location: ManagementSoftware.php?status=14');

?>