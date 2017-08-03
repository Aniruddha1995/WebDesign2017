<?php

$to = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["replymsg"];
$header = "From: khadija.b.khan@gmail.com \r\n";

$Enq_Email = mail ($to,$subject,$message,$header);
//Can't run this on the laptop! Has to be the desktop ->>

$proEnqID = $_POST["enqID"];
$proEnqEmailSent = "Yes";

//Connection to database
include "Database_Connection.php";

//Updating the enquiries table
$sqlUpdateEnq = "UPDATE enquiries SET Enq_EmailSent = ? WHERE Enq_ID = ?";

$dbrs = $dbConn->prepare ($sqlUpdateEnq);
$dbrs->execute (array($proEnqEmailSent,$proEnqID));

header('Location: ManagementSoftware.php?status=13');

?>