<?php
//Displays the header
include "header.php";

?>

<!--Contact Form-->
<h3>Contact Us Form</h3>
<div class="comment">
<?php 
if ( isset($_GET['status']) && $_GET['status'] == 1 ){echo "<h5><b>Contact Us Form is successfully sent<b></h5>";}
?>
</div>
<div class="container">
  <form action="ContactUsTable.php" method="post" enctype="multipart/form-data">

    <label for="fname">Your Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..." required>

    <label for="lname">Email Address</label>
    <input type="text" id="email" name="email" placeholder="Your Email address..." required>

	<label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="Write subject ..." required>
	
	<label for="YourComment">Your Comments</label>
    <textarea id="ycomments" name="ycomments" placeholder="Write your message here ...." style="height:200px" required></textarea>

    <input type="submit" value="Submit">

  </form>
</div>


