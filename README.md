# WebDesign2017
=====================\
Its an online grocery shopping where customers can view all products on special and without special products and search for any particular product. Customers can also subscribe to the mailing list and also unsubscribe themselves. The system also has the admin side where admin can log in and do all the administrative work as outline below. It also displays the catalogue and updates it.

Home Page
=====================
	Displays automatically all items from product table where product type is special item.

Subscription Page
=====================
	All fields are required.\
	Clicking submit will call the SubscriptionTable.php to be executed.\
	SubscriptionTable.php will check the user input and then connect to the database. It will insert the user input into the subscription table when the fields are not empty and return to the subscription page to display the message.

Contact Us Page
=====================
	All fields are required.\
	Clicking submit will call ContactUsTable.php to be executed.\
	ContactUsTable.php will check the user input and connect to the database. It will insert into the enquiries table when fields are not empty and return to the contact us page to display message.

Browse Page
=====================
	Displays all items from the product table.

Deals Page
=====================
	Displays all items from product table where product type is special item.

Login Page
=====================
	Default username and password is: admin\
	All fields are required\
	Clicking on login will call loginaccess.php to be executed. \
	loginaccess.php will connect to the database, start the session, check the user input. It will select the ID from the admin table when the match is found with the username and password and redirect the page to ManagementSoftware.php. \
	When match is not found it will redirect to login page and displays the error message.\
	You will be able to add new username and password in the management software.

Management Software Page
=====================
	Displays all items from the product table.\
	All fields are required.\
	Clicking the submit will call ProductTable.php to be executed.\
	ProductTable.php will check the user input, connects to the database, uploads the image to the database and runs sql statement (create, update or delete) according to the radio button selected.\
	Displays the message after completing a task. 

Category Update
=====================
	All fields are required.\
	Displays all items from tables (Fruit, Vegetable & Salad).\
	Clicking submit will call CatagoryTable.php to be executed.\
	 CatagoryTable.php will check the user input, connect to the database, run the sql (Update, Insert or Delete) according to the radio button selected.\
	Displays the message after completing a task.

Enquiries
=====================
	Displays all customer enquiries from enquiries table.\
	All fields are required.\
	Clicking reply will call Enq_Email.php to be executed. \
	Enq_Email.php will send the email, connect to the database and update the enquiries table. \
	Displays the message after completing a task.

Subscription
=====================
	Displays all from subscription table.\
	All fields are required.\
	Clicking reply will call Subreply.php to be executed. \
	Subreply.php will sent the catalogue to the customers.\
	Displays the message after completing a task.

Unsubscribe
=====================
	Displays the unsubscription and subscription table.\
	All fields are required.\
	Clicking submit will call subdel.php to be executed.\
	subdel.php will check the input, connect to the database and delete the row from subscription and unsubscription table. Displays message after completing a task.

Administration Login
=====================
	All fields are required.\
	Clicking add will call adminlogin.php to be executed.\
	adminlogin.php will check the input text entered, connect to the database and insert the username and password to the admin table so that they can access management software.\
	Displays the message after completing the task.

Catalogue
=====================
	When catalogue is clicked it will call catalogue.php to be executed.\
	catalogue.php will display all items from the product table where product type is special item and it has a link to unsubscribe.\
	When Click Here is clicked it will call unsubscribe.php and displays the form.

Unsubscribe
=====================
	unsubscribe.php will display a form to unsubscribe.\
	All fields are required.\
	Clicking unsubscribe will call UnsubscribeTable.php to be executed.\
	UnsubscribeTable.php will check the user input, connect to the database, insert the information into the unsubscription table and returns to the unsubscribe.php and displaying the message.

Search
=====================
	Search the product table from the database.\
	When submit is clicked it will call Search.php page to be executed.\
	Search.php will connect to the database and run the sql and if product name entered matches the database product name then it will display the result else displays the error message.

