<?php

require_once 'connect.php';
session_start();
$username = $_SESSION['adminUsername'];
if (isset($_POST['foodName'])){
        $foodName = $_POST['foodName'];
        $foodDesc = $_POST['foodDesc'];
        $foodPrice = $_POST['foodPrice'];
        $ing1 = $_POST['ing1'];
        $ing2 = $_POST['ing2'];
        $ing3 = $_POST['ing3'];
        $ing4 = $_POST['ing4'];
		$ing5 = $_POST['ing5'];
		$ing6 = $_POST['ing6'];
		$cate = $_POST['foodCategory'];
		$username = $_SESSION['username'];
 	if(!empty($foodName) && !empty($foodDesc) && !empty($foodPrice)){
        $query = "INSERT INTO `restaurant1` (foodName, foodDesc, foodPrice, ing1, ing2, ing3, ing4, ing5, ing6, foodCategory, restID) VALUES
                ('$foodName', '$foodDesc','$foodPrice','$ing1', '$ing2', '$ing3', '$ing4', '$ing5', '$ing6', '$cate', '$username')";
        $result = mysqli_query($con,$query);
        if($result){
            $message ="Item added succesfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
                }else{
                $message = "Please fill in all the fields";
                echo "<script type='text/javascript'>alert('$message');</script>";		
		}
    }
	
?>
<!DOCTYPE html>
<html>
<head>
		<title>Create Menu</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
        function goToHomepage(){
            location.href ="adminHome.php";       
        }
		
		
		function clearBox(elementID)
		{
		    document.getElementById(elementID).innerHTML = "";
		}
        
        </script>
</head>
	
<body>
	<div id="Navigation1">
		<a href='logout.php'>Logout</a>
		<input type="button" name="createMenu" value="Create Menu" onclick="createMenu.php"/>	
	</div>
	<div id="MainMenu">
		<h1>Appetizers</h1>
		<div id="appAnchor">
			<?php
			$sql = "SELECT * FROM restaurant1 WHERE foodCategory='Appetizer' AND restID='$username'";
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "Food name: " . $row["foodName"] . "<br>";
					echo "Food description: " . $row["foodDesc"] . "<br>";
					echo "Price: " . $row["foodPrice"] . "<br>";
					if ($row["ing1"] != NULL) {
					echo "Ingredients: " . $row["ing1"] . ", ". $row["ing2"] . ", ". $row["ing3"] . ", ". $row["ing4"] . ", ". $row["ing5"] . ", ". $row["ing6"] . "</div>" . "<br>"; }
					echo"<br><br>";
					}
			} else {
			    echo "";
			}		
			?>
		</div>
		<h1>Entrees</h1>
		<div id="entreeAnchor"></div>
		<?php
		$sql = "SELECT * FROM restaurant1 WHERE foodCategory='Entree' AND restID='$username'";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Food name: " . $row["foodName"] . "<br>";
				echo "Food description: " . $row["foodDesc"] . "<br>";
				echo "Price: " . $row["foodPrice"] . "<br>";
				if($row["ing1"] !=NULL){
				echo "Ingredients: " . $row["ing1"] . ", ". $row["ing2"] . ", ". $row["ing3"] . ", ". $row["ing4"] . ", ". $row["ing5"] . ", ". $row["ing6"] ."<br>"; }
		    echo"<br><br>";
				}
		} else {
		    echo "";
		}	
		?>
		<h1>Drinks</h1>
		<div id="drinksAnchor">
		<?php
		$sql = "SELECT * FROM restaurant1 WHERE foodCategory='Drink' AND restID='$username'";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Food name: " . $row["foodName"] . "<br>";
				echo "Food description: " . $row["foodDesc"] . "<br>";
				echo "Price: " . $row["foodPrice"] . "<br>";
				if($row["ing1"] !=NULL){
				echo "Ingredients: " . $row["ing1"] . ", ". $row["ing2"] . ", ". $row["ing3"] . ", ". $row["ing4"] . ", ". $row["ing5"] . ", ". $row["ing6"] ."<br>"; }
		    echo"<br><br>";
				}
		} else {
		    echo "";
		}	
		?>
		</div>
	</div>	
	<div id="AddItem">
		<form method="post" action="createMenu.php">
		Name<input type="text" id="food-name" name="foodName" style="font-size:14pt" size="15"><br>
		Description<input type="text" name="foodDesc" style="font-size:14pt" size="15"><br>
		Price<input type="text" name="foodPrice" style="font-size:14pt" size="15"><br>
		Ingredient 1<input type="text" name="ing1" style="font-size:14pt" size="15"><br>
		Ingredient 2<input type="text" name="ing2" style="font-size:14pt" size="15"><br>
		Ingredient 3<input type="text" name="ing3" style="font-size:14pt" size="15"><br>
		Ingredient 4<input type="text" name="ing4" style="font-size:14pt" size="15"><br>
		Ingredient 5<input type="text" name="ing5" style="font-size:14pt" size="15"><br>
		Ingredient 6<input type="text" name="ing6" style="font-size:14pt" size="15"><br>
        <select name="foodCategory">
           <option value="Appetizer">Appetizers</option>
           <option value="Entree">Entrees</option>
           <option value="Drink">Drinks</option>    
        </select>	
		         <input type="submit" value="Add" onclick="displayItem()">	
		</form>	
			
			
			
			
			
			
	</div>
	
	
	
</body>
		



</html>