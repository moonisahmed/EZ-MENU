<?php include('header.php'); ?>
<script>
	function goToRegister() {
            var val = document.getElementById("loginForm").loginType.value;
            if (val=="customer") {
                location.href = "customerRegister.php";
            }
            else if(val=="admin") {
                location.href = "adminRegister.php";
            }
            else {
                alert("Please select a login type");
            }
        }
		
		function checkLoginType() {
			var value = document.getElementById("loginForm").loginType.value;
			if (value=="admin") {
				document.getElementById("loginForm").action = "adminHome.php";
			}
			else if (value == "customer") {
				document.getElementById("loginForm").action = "customerHome.php";
			}
			else {
				alert("Please select a login type");
			}
		}
</script>

<body>
<div id="header">
	<h1> eZ Menu </h1>
</div>
    <div id="logo">
        <img src="logo.png" style="width:280px;height:250px">
    </div>
    
<div id="loginContent">
	<form name="form1" id="loginForm" method="post" action="">
		Username  <input type="text" name="username" style="font-size:14pt" size="15">
                </br></br>
		Password   <input type="password" name="password" style="font-size:14pt" size="15">
                </br></br>
                Select one
                <select name="loginType">
                    <option value="blank"></option>
                    <option value="admin">Administrator</option>
                    <option value="customer">Customer</option>
                </select>
</div>


<div id="Navigation">
	<ul>
		<li><input type="submit" value="Login" onclick="checkLoginType()"</a></li>
		<li><input type="button" value="Register" onclick="goToRegister()"</a></li>
	</ul>
</div>
</form> 
    
</body>

</html>
