<?php
//Displays the header
include "header.php";
include "session.php";

?>
<!--Displays the session and signout-->
<div>
<h3>Welcome to the Management Software. Our records shows that your username is :  <?php echo $login_session; ?></h3>
<h3><a href = "logout.php" style="text-decoration:none;">Sign Out</a></h3>
</div>

<!--Displays the messages when buttons are clicked in each tabs-->
<div class="comment">
<?php 
if ( isset($_GET['status']) && $_GET['status'] == 1 ){ echo "<h3><b>Product Table is successfully created<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 2 ){ echo "<h3><b>Product Table is successfully updated<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 3 ){ echo "<h3><b>Product Table is successfully deleted<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 4 ){ echo "<h3><b>Successfully Created Fruit Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 5 ){ echo "<h3><b>Successfully Created Vegetable Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 6 ){ echo "<h3><b>Successfully Created Salad Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 7 ){ echo "<h3><b>Successfully Updated Fruit Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 8 ){ echo "<h3><b>Successfully Updated Vegetable Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 9 ){ echo "<h3><b>Successfully Updated Salad Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 10 ){ echo "<h3><b>Successfully Deleted row from Fruit Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 11 ){ echo "<h3><b>Successfully Deleted row from Vegetable Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 12 ){ echo "<h3><b>Successfully Deleted row from Salad Category<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 13 ){ echo "<h3><b>Email Successfully sent and updated the enquiries table.<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 14 ){ echo "<h3><b>Email Successfully sent.<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 15 ){ echo "<h3><b>Successfully Updated the Mail Table.<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 16 ){ echo "<h3><b>Successfully Unsubscribed .<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 17 ){ echo "<h3><b>Successfully Deleted from subscription Table .<b></h3>";}
if ( isset($_GET['status']) && $_GET['status'] == 18 ){ echo "<h3><b>Successfully added a username and password to the database .<b></h3>";}
?>
</div>

<!--Displays the Tablinks on the page-->
<div class="tab">
  <button class="tablinks" onclick="openMenu(event, 'ProductMasterfile')"id="defaultOpen"><b>Product Masterfile<b></button>
  <button class="tablinks" onclick="openMenu(event, 'Category')"><b>Category Update<b></button>
  <button class="tablinks" onclick="openMenu(event, 'Enquiries')"><b>Enquiries<b></button>
  <button class="tablinks" onclick="openMenu(event, 'Subscription')"><b>Subscription<b></button>
  <button class="tablinks" onclick="openMenu(event, 'Unsubscription')"><b>Unsubscription<b></button>
  <button class="tablinks" onclick="openMenu(event, 'Login')"><b>Administration Login<b></button>

<!--Opens the catalogue page-->  
<form>
<input type="button" value="Catalogue" onclick="openWin()">
</form>
</div>
  <!--Opens Catalogue page-->
 <script>
function openWin() {
    window.open("catalogue.php");
}
</script>
 
<!--Creates and Updates the product table from the database.-->
<div id="ProductMasterfile" class="tabcontent">
  <h6><b>Product Masterfile<b></h6>	
	<form action="ProductTable.php" method="post" enctype="multipart/form-data">
		<input type="radio" name="radio" value="Create Item">Create Item
		<input type="radio" name="radio" value="Update Item">Update Item
		<input type="radio" name="radio" value="Delete Item">Delete Item
		<br>
		<br>				
		<label for="PID">Product ID</label>
		<input type="text" id="pid" name="productid" required>		
		<br>
		<br>
		<div class="ProdInfo">
		<?php
		//Loads the database into the screen and displaying in the table.
		include "Database_Connection.php";
				
		$sqlVeiw = "SELECT * FROM product";

		$dbrs = $dbConn->prepare ($sqlVeiw);
		$dbrs->execute ();

		echo "<table border='2' >
		<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Category</th>
		<th>Type</th>
		<th>Photo</th>
		</tr>";
		
		foreach($dbrs as $dbrow)
		  {
		  echo "<tr>";
		  echo "<td>" . $dbrow['Prod_ID'] . "</td>";
		  echo "<td>" . $dbrow['Prod_Name'] . "</td>";
		  echo "<td>" . $dbrow['Prod_Description'] . "</td>";
		  echo "<td>" . $dbrow['Prod_Price'] . "</td>";
		  echo "<td>" . $dbrow['Prod_Category'] . "</td>";
		  echo "<td>" . $dbrow['Prod_Type'] . "</td>";
		  echo "<td>" . "<img height='70px' width='70px' src='data:image/jpeg;base64,". base64_encode($dbrow['Prod_Photo']) . "'/></td>";
		  echo "</tr>";
		  }
		echo "</table>";
		?>
		</div>
		<br>
		<br>		
		<label for="Pname">Product Name</label>
		<input type="text" id="fname" name="productname" required>
		
		<label for="description">Description</label>
		<input type="text" id="pdescription" name="description" required >
		
		<label for="price">Price</label>
		<input type="text" id="sprice" name="specialprice" required>
		<br>
		<br>
		<label for="catagory">Select Category:</label><br><br>
		<select name="cat">
		<option value="Fruit">Fruit</option>
		<option value="Vegetable">Vegetable</option>
		<option value="Salad">Salad</option>
		</select>
		<br>
		<br>
		<label for="PType">Select Product Type:</label><br><br>
		<select name="type">
		<option value="Special Item">Special Item</option>
		<option value="Non-Special Item">Non-Special Item</option>
		</select>
		<br>
		<br>
		<br>
		<br>
		Select image to upload:
		<input type="file" name="FileToUpload" id="FileToUpload" required>
		<br>
		<br>
		<br>
		<br>
		<input type="submit" name="submit" > 
	</form>
</div>

<!--Tab Catagory. Creates, updates and deletes the cata table.--> 
<div id="Category" class="tabcontent">
  <h6><b>Category Update<b></h6>
	<form action="CatagoryTable.php" method="post" enctype="multipart/form-data">
		<input type="radio" name="radiocat" value="Create Item">Create Item
		<input type="radio" name="radiocat" value="Update Item">Update Item
		<input type="radio" name="radiocat" value="Delete Item">Delete Item
		<br>
		<br>
	<br>
	<br>
		<label for="catagory">Select Category:</label><br><br>
		<select name="cat">
		<option value="Fruit">Fruit</option>
		<option value="Vegetable">Vegetable</option>
		<option value="Salad">Salad</option>
		</select>
		<br>
		<br>
		<label for="PID">Product ID</label>
		<input type="text" id="pid" name="productid" required>
		<br>
		<br>
		<br>
		<div class="ProdInfo">
		<?php
		//Loads the database into the screen and displaying the table.
		
		//Connection to database
		include "Database_Connection.php";
		
		
		//Sql Script
		$sqlVeiw1 = "SELECT * FROM fruit";
		$sqlVeiw2 = "SELECT * FROM vegetable";
		$sqlVeiw3 = "SELECT * FROM salad";
		
		//Displaying the fruit table
		$dbrs = $dbConn->prepare ($sqlVeiw1);
		$dbrs->execute ();
			
			echo "Fruit Table";
			echo "<table border='2'>
			<tr>
			<th>ID</th>
			<th>Ratings</th>
			<th>Product Of</th>
			<th>Kg or Each</th>
			</tr>";
			
			foreach($dbrs as $dbrow)
			  {
			  echo "<tr>";
			  echo "<td>" . $dbrow['Prod_ID'] . "</td>";
			  echo "<td>" . $dbrow['Ratings'] . "</td>";
			  echo "<td>" . $dbrow['Product_Of'] . "</td>";
			  echo "<td>" . $dbrow['Kg_or_Each'] . "</td>";
			  echo "</tr>";
			  }
			echo "</table>";
			echo "<br>";
			echo "<br>";		
		
		//Displaying the Vegetable table
		$dbrs = $dbConn->prepare ($sqlVeiw2);
		$dbrs->execute ();
			
			echo "Vegetable Table";
			echo "<table border='2'>
			<tr>
			<th>ID</th>
			<th>Ratings</th>
			<th>Product Of</th>
			<th>Kg or Each</th>
			</tr>";
			
			foreach($dbrs as $dbrow)
			  {
			  echo "<tr>";
			  echo "<td>" . $dbrow['Prod_ID'] . "</td>";
			  echo "<td>" . $dbrow['Ratings'] . "</td>";
			  echo "<td>" . $dbrow['Product_Of'] . "</td>";
			  echo "<td>" . $dbrow['Kg_or_Each'] . "</td>";
			  echo "</tr>";
			  }
			echo "</table>";
			echo "<br>";
			echo "<br>";
		
		//Displaying the Salad table
		$dbrs = $dbConn->prepare ($sqlVeiw3);
		$dbrs->execute ();
			
			echo "Salad Table";
			echo "<table border='2'>
			<tr>
			<th>ID</th>
			<th>Ratings</th>
			<th>Product Of</th>
			<th>Kg or Each</th>
			</tr>";
			
			foreach($dbrs as $dbrow)
			  {
			  echo "<tr>";
			  echo "<td>" . $dbrow['Prod_ID'] . "</td>";
			  echo "<td>" . $dbrow['Ratings'] . "</td>";
			  echo "<td>" . $dbrow['Product_Of'] . "</td>";
			  echo "<td>" . $dbrow['Kg_or_Each'] . "</td>";
			  echo "</tr>";
			  }
			echo "</table>";
		
		?>	
		</div>
		<label for="Ratings">Ratings</label>
		<select  name="rating">
			<option  value=1>&#9733;&#9734;&#9734;&#9734;&#9734;</option>
			<option  value=2>&#9733;&#9733;&#9734;&#9734;&#9734;</option>
			<option  value=3>&#9733;&#9733;&#9733;&#9734;&#9734;</option>
			<option  value=4>&#9733;&#9733;&#9733;&#9733;&#9734;</option>
			<option  value=5>&#9733;&#9733;&#9733;&#9733;&#9733;</option>
		</select>
		
		<label for="Productof">Product of</label>
		<input type="text" id="prodof" name="productof" required>
		
		<label for="kg_each">Kg or Each</label>
		<input type="text" id="kgeach" name="kgoreach" required>
		<input type="submit" name="submit" >
	</form>

</div>

<!--Tab Enquiries. Displays the enquiries table and sends email--> 
<div id="Enquiries" class="tabcontent">
  <h6><b>Customer Enquiries<b></h6>
	<form action="Enq_Email.php" method="post" enctype="multipart/form-data">
	<fieldset><legend align="center"> Customers Enquiries</legend>
	<br>
	<br>
	<div class="ProdInfo">
	<?php
		//Loads the database into the screen and displaying in the table.
		include "Database_Connection.php";
				
		$sqlVeiw = "SELECT * FROM enquiries";

		$dbrs = $dbConn->prepare ($sqlVeiw);
		$dbrs->execute ();

		echo "<table border='2' >
		<tr>
		<th> Enq-ID</th>
		<th>Customer Name</th>
		<th>Email</th>
		<th>Subject</th>
		<th>Message</th>
		<th>Enq Email Sent</th>
		</tr>";
		
		foreach($dbrs as $dbrow)
		  {
		  echo "<tr>";
		  echo "<td>" . $dbrow['Enq_ID'] . "</td>";
		  echo "<td>" . $dbrow['Enq_CusName'] . "</td>";
		  echo "<td>" . $dbrow['Enq_CusEmail'] . "</td>";
		  echo "<td>" . $dbrow['Enq_Subject'] . "</td>";
		  echo "<td>" . $dbrow['Enq_Message'] . "</td>";
		  echo "<td>" . $dbrow['Enq_EmailSent'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
		?>
	</div>
	</fieldset>
	<br>
	<br>
	<label>Enquiry ID:</label>	
	<input type="text" name="enqID" required>
	<br>
	<br>
	<label>To:</label>	
	<input type="text" name="email" placeholder="Enter Customers Email address." required>
	<br>
	<br>
	<label>Subject:</label>	
	<input type="text" name="subject"  required>
	<br>
	<br>
	<label>Message:</label>	
	<textarea name="replymsg"  placeholder="Write your reply message here ...." style="height:150px" required></textarea>
	<br>
	<br>
	<br>
	<br>
	<input type="submit" value="Reply" >
	</form>
</div>

<!--Tab subscription. It displays the subscription table and send the catalogue to the customers.--> 
<div id="Subscription" class="tabcontent">
  <h6><b>Subscription Details<b></h6>
	
	<fieldset><legend align="center"> Customers Subscription details</legend>
	<br>
	<div class="ProdInfo" >
	<?php
		//Loads the database into the screen and displaying in the table.
		include "Database_Connection.php";
				
		$sqlSubTVeiw = "SELECT * FROM subscription";

		$dbrs = $dbConn->prepare ($sqlSubTVeiw);
		$dbrs->execute ();

		echo "<table border='2' >
		<tr>
		<th>ID</th>
		<th>FName</th>
		<th>LName</th>
		<th>Email</th>
		<th>Catalogue</th>
		</tr>";
		
		foreach($dbrs as $dbrow)
		  {
		  echo "<tr>";
		  echo "<td>" . $dbrow['Sub_ID'] . "</td>";
		  echo "<td>" . $dbrow['Cus_FN'] . "</td>";
		  echo "<td>" . $dbrow['Cus_LN'] . "</td>";
		  echo "<td>" . $dbrow['Cus_Email'] . "</td>";
		  echo "<td>" . $dbrow['Catalogue'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
		?>
	</div>
	</fieldset>	
	<br>
	<br>
	<form action="Subreply.php" method="post" enctype="multipart/form-data">
	<fieldset><legend align="center">Sent Catalogue</legend>
	<br>
	<br>
	<br>
	<label>Subscription ID:</label>	
	<input type="text" name="subID" required>
	<br>
	<br>
	<label>To:</label>	
	<input type="text" name="subemail" placeholder="Enter Customers Email address." required>
	<br>
	<br>
	<label>Subject:</label>	
	<input type="text" name="subject" placeholder="Enter subject as Cat-[Date]"  required>
	<br>
	<br>
	<input type="submit" value="Reply" >
	</fieldset>
	</form>
</div>

<!--Tab Unsubscription. It displays the unsubscribe and subscription table and delete the record from subscription and unsubscription tables.--> 
<div id="Unsubscription" class="tabcontent">
  <h6><b>Unsubscription Details<b></h6>
	<fieldset><legend align="center">Unsubscription Details</legend>
	<br>
	<br>
	<div class="ProdInfo" >
	<?php
		//Loads the database into the screen and displaying in the table.
		include "Database_Connection.php";
				
		$sqlUnsubTVeiw = "SELECT * FROM unsubscribe";

		$dbrs = $dbConn->prepare ($sqlUnsubTVeiw);
		$dbrs->execute ();
		
		echo "Unsubscription Details";
		echo "<br>";
		echo "<br>";
		echo "<table border='2' >
		<tr>
		<th>Unsub ID</th>
		<th>FName</th>
		<th>LName</th>
		<th>Email</th>
		</tr>";
		
		foreach($dbrs as $dbrow)
		  {
		  echo "<tr>";
		  echo "<td>" . $dbrow['Unsub_ID'] . "</td>";
		  echo "<td>" . $dbrow['Cus_FN'] . "</td>";
		  echo "<td>" . $dbrow['Cus_LN'] . "</td>";
		  echo "<td>" . $dbrow['Cus_Email'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
		?>
	</div>
	</fieldset>
	<fieldset><legend align="center">Subscription Details</legend>
	<br>
	<br>
	<div class="ProdInfo" >
	<?php
		//Loads the database into the screen and displaying in the table.
		include "Database_Connection.php";
				
		$sqlSubTVeiw = "SELECT * FROM subscription";

		$dbrs = $dbConn->prepare ($sqlSubTVeiw);
		$dbrs->execute ();

		echo "<table border='2' >
		<tr>
		<th>ID</th>
		<th>FName</th>
		<th>LName</th>
		<th>Email</th>
		</tr>";
		
		foreach($dbrs as $dbrow)
		  {
		  echo "<tr>";
		  echo "<td>" . $dbrow['Sub_ID'] . "</td>";
		  echo "<td>" . $dbrow['Cus_FN'] . "</td>";
		  echo "<td>" . $dbrow['Cus_LN'] . "</td>";
		  echo "<td>" . $dbrow['Cus_Email'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
		?>
	</div>
	</fieldset>
	<br>
	<br>
	<form action="subdel.php" method="post" enctype="multipart/form-data">
	<fieldset><legend align="center">Delete Subscription</legend>
	<br>
	<br>
	<br>
	<label>Subscription ID:</label>	
	<input type="text" name="subID" required>
	<br>
	<br>
	<label>Unsubscription ID:</label>	
	<input type="text" name="unsubID" required>
	<input type="submit" >
	</form>
</div>

<!--It adds the username and password to the database who can access the management software.-->
<div id="Login" class="tabcontent">
  <h6><b>Administration Login<b></h6>
	<form action="adminlogin.php" method="post" enctype="multipart/form-data">
	<fieldset><legend align="center">Administration Login</legend>
	<br>
	<br>
	<br>
	<label>Username</label>	
	<input type="text" name="username" required>
	<br>
	<br>
	<label>Password</label>	
	<input type="text" name="password" required>
	<input type="submit" value="Add" >
	</form>
</div>

<!--Displaying the tab links and tab contents.--> 
<script>
function openMenu(evt, MenuName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(MenuName).style.display = "block";
    evt.currentTarget.className += " active";
}


document.getElementById("defaultOpen").click();
</script>