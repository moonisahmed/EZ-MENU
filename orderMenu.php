<!-- ORDERING MENU -->

<?php
session_start();
?>
<html>
	<head>
		<title>ORDER MENU</title>
	</head>	
	<?php
		require_once 'connect.php';   

		//3. If the form is submitted or not.
		//3.1 If the form is submitted
		if (isset($_POST['uniqueID'])){
			//3.1.1 Assigning posted values to variables.
			$uniqueID = $_POST['uniqueID'];
			//3.1.2 Checking the values are existing in the database or not
			$query = "SELECT * FROM adminUser WHERE uniqID='$uniqueID'";
			$result = mysqli_query($con,$query) or die(mysqli_error());
			$count = mysqli_num_rows($result);
			//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
			if ($count == 1){		
				$_SESSION['orderSession'] = $uniqueID;
				$_SESSION['itemCount'] = 1;
			}else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				echo "Invalid UNIQUE ID. Please try again.";
					}
				}
			//3.1.4 if the user is logged in Greets the user with message
			if (isset($_SESSION['orderSession'])){
				echo "Hi, start ordering now.";
				echo "<a href='logout.php'>Logout</a>"; 
			}else{
				header("Location: login.php");
		 	}
		
	?>
	<body>
	<?php
	$uniqueID = $_SESSION['orderSession'];
	$sql = "SELECT * FROM adminUser, restaurant1 WHERE uniqID='$uniqueID' AND username=restID";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
			$foodName = $row["foodName"];
			$foodPrice = $row["foodPrice"];					
	        echo "<br>Food name: " . $row["foodName"] . "<br>";
			echo "Food description: " . $row["foodDesc"] . "<br>";
			echo "Price: " . $row["foodPrice"] . "<br>";
			if ($row["ing1"] != NULL) {
			echo "Ingredients: " . $row["ing1"] . ", ". $row["ing2"] . ", ". $row["ing3"] . ", ". $row["ing4"] . ", ". $row["ing5"] . ", ". $row["ing6"] . "</div>" . "<br>"; }
			echo "<form method='post' action='orderMenu.php'>
				<input type='hidden' value='$foodName' name='foodName'/>
				<input type='hidden' value='$foodPrice' name='foodPrice'/>
				<input type='submit' value='Order Item'/>
				</form>";	
			}
	} else {
	    echo "";
	}	
	?>
	
	<h1>ORDERED ITEMS</h1>
	<?php		
		if (isset($_POST['foodName']) && isset($_POST['foodPrice'])) {
		$foodNameDelete = $_POST['foodName'];
		$foodPriceDelete = $_POST['foodPrice'];
		$custUsername = $_SESSION['username'];
		$itemCount = $_SESSION['itemCount'];
		$str = (string)$itemCount;
		$itemNo = $str . $custUsername;
        $query = "INSERT INTO `order` (foodName, foodPrice, customer, itemNo) VALUES
                ('$foodNameDelete', '$foodPriceDelete','$custUsername', '$itemNo')";
		$result = mysqli_query($con,$query);
		//echo $itemCount . ". " . $foodNameDelete . $foodPriceDelete;
		$itemCount++;
		$_SESSION['itemCount'] = $itemCount;
			}
			
			
			if (isset($_POST['itemNo'])) {
				$itemNo = $_POST['itemNo'];
				$sql = "DELETE FROM `SENG301DB`.`order` WHERE `order`.`itemNo` = '$itemNo'";
				$result = $con->query($sql);
				if ($result->num_rows > 0) {
					echo "item deleted";
				}
			}
			
				
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM `order` WHERE customer='$username'";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
		   // output data of each row
		    while($row = $result->fetch_assoc()) {
				$foodName = $row["foodName"];
				$foodPrice = $row["foodPrice"];
				$itemNo = $row["itemNo"];					
		        echo "<br>Food name: " . $row["foodName"] . "<br>";
				echo "Price: " . $row["foodPrice"] . "<br>";	
		
				echo "<form method='post' action='orderMenu.php'>
					<input type='hidden' value='$itemNo' name='itemNo'/>
					<input type='submit' value='Delete'/>
					</form>";	
				}
			} else {
				echo "";
			}
		
		
		$username = $_SESSION['username'];	
        $sql = "SELECT SUM(foodPrice),customer from `order` WHERE customer='$username' GROUP BY customer";
		$result = $con->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION['totalPrice'] = $row['SUM(foodPrice)'];
				echo "Total Price: $" . $row['SUM(foodPrice)'];
			}
		} else {
			echo "Total Price: $0.00"; 
		}
	?>
	
	<div id="RequestButtons">
		<?php
		$drinkRequest = "Drink Refill";
		$username = $_SESSION['username'];
		echo "<form method='post' action='orderMenu.php'>
			<input type='hidden' value='$drinkRequest' name='drinkReq'/>
			<input type='hidden' value='$username' name='custUser'/>
			<input type='submit' value='Drink Refill'/>
			</form>";
		if (isset($_POST['drinkReq'])) {
			$_SESSION['customerUserRequest'] = $username;
			$_SESSION['requestType'] = $drinkRequest;
		}	
		
		?>
		
	</div>
	</body>
	
</html>