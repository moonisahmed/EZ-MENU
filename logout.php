<?php
session_start();
unset($_SESSION["adminUsername"]);  
header("Location: main.php");
?>