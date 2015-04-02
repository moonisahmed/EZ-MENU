<?php

require_once 'connect.php';

if (isset($_POST['username']) && isset($_POST['adminPassword'])){
        $username = $_POST['username'];
        $email = $_POST['email'];	
        $password = $_POST['adminPassword'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phoneNum'];
        $restName = $_POST['restaurantName'];
        $restLoc = $_POST['restaurantLocation'];
        $restType = $_POST['restaurantType'];
        $restNum = $_POST['restaurantNum'];
        $reservation = $_POST['reservation'];
       	$uniqID = uniqid();
 	if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($password) 
                && !empty($restName) && !empty($restLoc) && !empty($restType) && !empty(restNum)
                && !empty($reservation)){
        $query = "INSERT INTO `adminUser` (username, password, fname, lname, email, phoneNum, restName, restLoc, restType, restNum, reservation, uniqID) VALUES
                ('$username', '$password','$firtname','$lastname', '$email', '$phoneNum', '$restName',
                '$restLoc', '$restType', '$restNum', '$reservation', '$uniqID')";
        $result = mysqli_query($con,$query);
        if($result){
            $message ="Administative account created succesfully";
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
        <title>Administration Registration</title>
        <script>
        function goToHomepage(){
            location.href ="main.php"
            
        }
        
        </script>
    </head>
    <link rel="stylesheet" href="style.css" type="text/css">
    
    <body>
        <div id="registrationContent">
        <form method="post" action="adminRegister.php">
            <table>
            <h1>GENERAL</h1>
            Username<input type="text" name="username" style="font-size:14pt" size="15"></br></br>
            Password<input type="password" name="adminPassword" style="font-size:14pt" size="15"></br></br>
            First name<input type="text" name="firstname" style="font-size:14pt" size="15"></br></br>
            Last name<input type="text" name="lastname" style="font-size:14pt" size="15"></br></br>
            </br></br>
            <h1>CONTACT</h1>
            Email<input type="text" name="email" style="font-size:14pt" size="15"></br></br>
            Phone Number<input type="text" name="phoneNum" style="font-size:14pt" size="15"></br></br>
            </br></br>
            <h1>RESTAURANT INFORMATION</h1>
            Name<input type="text" name="restaurantName" style="font-size:14pt" size="15"></br></br>
            Location<input type="text" name="restaurantLocation" style="font-size:14pt" size="15"></br></br>
            Category
                 <select name="restaurantType">
                    <option value="blank"></option>
                    <option value="African">African</option>
                    <option value="Asian">Asian</option>
                    <option value="Asian">European</option>
                    <option value="Asian">Oceanian</option>
                    <option value="Asian">Indian</option>      
                 </select> </br></br>
                 Phone Num<input type="text" name="restaurantNum" style="font-size:14pt" size="15"><br><br>
            Reservation<tab><input type="radio" name="reservation" value="yes">Yes
				<input type="radio" name="reservation" value="no">No</br>
                </form>
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
