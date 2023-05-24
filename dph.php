<?php
    $hostname = "localhost";
    $username = "basicn587_public";
    $password = "iLikePizzaRolls3";
    $db = "basicn587_news";
    
    $dbconnect=mysqli_connect($hostname,$username,$password,$db);
    
    if ($dbconnect->connect_error) {
      die("Database connection failed: " . $dbconnect->connect_error);
    }
?>