<?php
session_start();
?><!--ADMIN HOMEPAGE -->
<html>
<head>
	<title>ADMIN HOMEPAGE</title>
	<script>
	function goToCreateMenu() {
		location.href = "createMenu.php";		
	}
	</script>
</head>
<?php
	require_once 'connect.php';   

	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if (isset($_POST['username']) and isset($_POST['password'])){
		//3.1.1 Assigning posted values to variables.
		$username = $_POST['username'];
		$password = $_POST['password'];
		//3.1.2 Checking the values are existing in the database or not
		$query = "SELECT * FROM adminUser WHERE username='$username' and password='$password'";
 
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$count = mysqli_num_rows($result);
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
		if ($count == 1){
			$_SESSION['adminUsername'] = $username;
		}else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			echo "Invalid Login Credentials.";
				}
			}
		//3.1.4 if the user is logged in Greets the user with message
		if (isset($_SESSION['adminUsername'])){
			$username = $_SESSION['adminUsername'];
			echo "Hi " . $username . "<br>";
			echo "This is the Admin Area <br>";
			echo "<input type='button' value='Create Menu' onclick='goToCreateMenu()'>";
			echo "<a href='logout.php'>Logout</a>";
		}else{
			header("Location: main.php");
	 	} 	
?>
<body>
	<div id="NavigationAdminHome">	
		<?php
		echo $_SESSION['adminUsername'];
		$username = $_SESSION['adminUsername'];
		$sql = "SELECT uniqID FROM adminUser WHERE username='$username'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		if ($result->num_rows > 0) {
			while($row = $result ->fetch_assoc()){
				echo "<br>Your restaurant unique ID is " . $row['uniqID'] . ". <br>Give this ID to your customers.";
			}
		}
		?>	
	</div>
	
	<div id="Customer Requests">
		<?php
			if (isset($_SESSION['adminUsername']) && $_SESSION['requestType']) {
				$value= $_SESSION['requestType'] . " for " . $_SESSION['username'];
				echo "<input type='button' value='$value'";
				
			}	
			
		?>
		
	</div>
	
	
</body>

</html>