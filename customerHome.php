<!-- CUSTOMER HOMEPAGE -->

<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<script>
		function goToBrowseRestaurant() {
			location.href = "browseRest.php"	
		}
		
		</script>	
		<title>Customer Homepage</title>
	</head>
<?php
	require_once 'connect.php';   
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if (isset($_POST['username']) and isset($_POST['password'])){
		//3.1.1 Assigning posted values to variables.
		$custUsername = $_POST['username'];
		$password = $_POST['password'];
		//3.1.2 Checking the values are existing in the database or not
		$query = "SELECT * FROM customerUser WHERE username='$custUsername' and password='$password'";
 
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$count = mysqli_num_rows($result);
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
		if ($count == 1){
			$_SESSION['username'] = $custUsername;
		}else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			echo "Invalid Login Credentials.";
				}
			}
		//3.1.4 if the user is logged in Greets the user with message
		if (isset($_SESSION['username'])){
			$custUsername = $_SESSION['username'];
			echo "Hi " . $username . "<br>";
			echo "This is the customer Area <br>";
			echo "<a href='logout.php'>Logout</a>"; 
		}else{
			header("Location: login.php");
	 	} 	
?>	
	
	<body>
		<input type="button" value="Browse Restaurants" onclick="goToBrowseRestaurant()">
		<form method="post" action="orderMenu.php">
			UNIQUE RESTAURANT ID <input type="text" name="uniqueID" style="font-size:14pt" size="15">
			<input type="submit" value="START ORDERING">
		</form>
		
	</body>
	
	
	
</html>