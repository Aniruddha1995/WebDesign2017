<?php

//assigning variables to the user input.
$proID = test_input($_POST["productid"]);
$proName = test_input($_POST["productname"]);
$proDes = test_input($_POST["description"]);
$proPrice = test_input($_POST["specialprice"]);
$proCat = test_input($_POST["cat"]);
$proType = test_input($_POST["type"]);
$proCreateUpdate= ($_POST["radio"]);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

//Uploading Image to the database.
$upload_photo = file_get_contents ($_FILES["FileToUpload"]["tmp_name"]);

//Connecting to the database and create rows, update rows and delete rows in the product tables.

include "Database_Connection.php";

//Running the sql script
$sqlCreate = "INSERT INTO product (Prod_ID, Prod_Name, Prod_Description, Prod_Price, Prod_Category, Prod_Type, Prod_Photo) VALUES (?,?,?,?,?,?,?)";
$sqlUpdate= "UPDATE product SET Prod_Name=?, Prod_Description=?, Prod_Price=?, Prod_Category=?, Prod_Type=?, Prod_Photo=? WHERE Prod_ID=?";
$sqlDelete="DELETE FROM product WHERE Prod_ID=?";

//Creates the product table
if ($proCreateUpdate=='Create Item'){
	$dbrs = $dbConn->prepare ($sqlCreate);
	$dbrs->execute (array($proID,$proName,$proDes,$proPrice,$proCat,$proType,$upload_photo));
	header('Location: ManagementSoftware.php?status=1');
}


//Updates the product table
if ($proCreateUpdate=='Update Item'){
	$dbrs = $dbConn->prepare ($sqlUpdate);
	$dbrs->execute (array($proName,$proDes,$proPrice,$proCat,$proType,$upload_photo,$proID));
	header('Location: ManagementSoftware.php?status=2');
}


//This deletes the row in product table only when the child tables same Prod_ID entry is deleted.
if ($proCreateUpdate=='Delete Item'){
	$dbrs = $dbConn->prepare ($sqlDelete);
	$dbrs->execute (array($proID));
	header('Location: ManagementSoftware.php?status=3');
	
}

?>



