<?php
//Displays the header
include "header.php";

?>

<!--Login form-->
<div>
<?php
if ( isset($_GET['status']) && $_GET['status'] == 1 ){ echo "<h3><b>Login failed. Please enter correct username and password<b></h3>";}
?>
</div>
<div>
<form class="login" action="loginaccess.php" method="post" enctype="multipart/form-data">
  <div class="imgcontainer">
    <img src="avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="logincontainer">
	<div class="admin">
		<label><b>Administration Use Only</b></label><br><br>
	</div>
	
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me

  </div>  

  <div class="logincontainer" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="Refresh()">Cancel</button>
  </div>
</form>
</div>

<script>
function Refresh() {
    window.open("login.php", "_self");
}

</script>



