<?php
//Displays the header
include "header.php";

?>

<!--Sign Up form-->
<h3>Unsubscribe Form</h3>
<div class="comment">
<?php 
if ( isset($_GET['status']) && $_GET['status'] == 1 ){echo "<h5><b>Successfully submitted unsubscription form. It may take 48 hours to update the system.<b></h5>";}
?>
<div class="container">
	<form action="UnsubscribeTable.php" method="post" enctype="multipart/form-data" >
  
		<fieldset><legend><b>Customer Details<b></legend><br>
		<label><b>First Name</b></label>
		<input type="text" placeholder="Enter First Name" name="FName" required>
		<br>
		<br>
		<label><b>Last Name</b></label>
		<input type="text" placeholder="Enter Last Name" name="LName" required>
		<br>
		<br>
		<label><b>Email</b></label>
		<input type="text" placeholder="Enter Email Address" name="email" required>
		</fieldset><br>
		<br>
		<br>
		<div>
		<input type="submit" value="Unsubscribe" >
		</div>
	</form>
</div>