<?php

require_once 'connect.php';

if (isset($_POST['username']) && isset($_POST['customerPassword'])){
        $username = $_POST['username'];
        $password = $_POST['customerPassword'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phoneNum'];
        $favFood = $_POST['favFood'];
		$favRest = $_POST['favRest'];
            
 	if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($password) 
                && $favFood != "blank" && $favRest != "blank"){
        $query = "INSERT INTO `customerUser` (username, password, fname, lname, email, phoneNum, favFood, favRest) VALUES
                ('$username', '$password','$firtname','$lastname', '$email', '$phoneNum', '$favFood', '$favRest')";
        $result = mysqli_query($con,$query);
        if($result){
            $message ="Customer account created succesfully";
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
        <title>Customer Registration</title>
        <script>
        function goToHomepage(){
            location.href ="main.php";
            
        }
        
        </script>
    </head>
    <link rel="stylesheet" href="style.css" type="text/css">
    
    <body>
        <div id="registrationContent">
        <form method="post" action="customerRegister.php">
            <table>
            <h1>GENERAL</h1>
            Username<input type="text" name="username" style="font-size:14pt" size="15"></br></br>
            Password<input type="password" name="customerPassword" style="font-size:14pt" size="15"></br></br>
            First name<input type="text" name="firstname" style="font-size:14pt" size="15"></br></br>
            Last name<input type="text" name="lastname" style="font-size:14pt" size="15"></br></br>
            </br></br>
            <h1>OPTIONAL</h1>
            Email<input type="text" name="email" style="font-size:14pt" size="15"></br></br>
            Phone Number<input type="text" name="phoneNum" style="font-size:14pt" size="15"></br></br>
            </br></br>
            <h1>PERSONAL</h1>
            Favorite Food
                 <select name="favFood">
                    <option value="blank"></option>
                    <option value="Pizza">Pizza/option>
                    <option value="Garlic Bread">Garlic Bread</option>
                    <option value="Pasta">Pasts</option>
                    <option value="Sushi">Sushi</option>
                    <option value="Hotdogs">Hotdogs</option> 
					<option value="Other">Indian</option>     
                 </select> </br></br>
			Favorite Restaurant
                <select name="favRest">
                   <option value="blank"></option>
                   <option value="Joey's">African</option>
                   <option value="Boston Pizza">Asian</option>
                   <option value="Tony Roma's">European</option>
                   <option value="Globe Fish">Oceanian</option>
                   <option value="Pizza Hut">Indian</option> 
				   <option value="Other">Indian</option>       
                </select>
                 
            <div id="Navigation">
                <ul>
                  <li><input type="submit" value="Register"></li>
                     <li><input type="button" value="Cancel" onclick="goToHomepage()"></li>   
                 </ul>        
        </div> 
        </div>  
        
    </body> 
    <br><br><br><br>
</html>
