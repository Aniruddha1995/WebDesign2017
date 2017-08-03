<?php
//Displays the header
include "header.php";

?>

<!--Subscription form-->
<h3>Email Subscription Form</h3>
<div>
<?php 
if ( isset($_GET['status']) && $_GET['status'] == 1 ){ echo "<h5><b>Form successfully sent<b></h5>";}
?>
</div>
 
<div class="container">
	<form action="SubscriptionTable.php" method="post" enctype="multipart/form-data" >
   
		<fieldset><legend><b>Customer Details<b></legend><br>
	
		<label><b>First Name</b></label> 
		<input type="text" placeholder="Enter First Name" name="FName" required>	
	
		<label><b>Last Name</b></label>
		<input type="text" placeholder="Enter Last Name" name="LName" required>
	
		<label><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email" required>
		</fieldset><br>
	
		<p>Subscribe: </p>
		<input name="sub" type="radio" value="Email" checked>To receive emails from Fresh Produce
		<br>
		<br>
		<p>By creating an account you agree to our <a href="Terms_Condition.php">Terms & Privacy</a>.</p>

		<div class="clearfix">
		  <input type="submit" value="Submit">
		</div>
	</form>
</div>