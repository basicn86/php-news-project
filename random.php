<?php
require("./dph.php");

try{
    //The purpose of this code is to select one random article from the database and redirect the user to that page
    //This page has NO OUTPUTS and will redirect the user to an article using the header(); function

    //This SQL statement selects ONE RANDOM article from the database
    $sqlcommand = $sqlcommand = "SELECT id FROM articles ORDER BY rand() LIMIT 1";

    $query_result = mysqli_query($dbconnect, $sqlcommand);

    //if an error occurs, just throw an exception
    if($query_result == false){
        throw new Exception('404 article not found');
    }
    if(mysqli_num_rows($query_result) < 1){
        throw new Exception('404 article not found');
    }

    //Fetch the one row that is in the results
    $row = mysqli_fetch_assoc($query_result);

    //Do not cache the header, as the header will be random each time
    //If this line is removed, then the header will be cached when random.php loads
    //This causes a bug where random.php will always redirect the user to the same article.
    header("Cache-Control: no-cache");
    header("Location: http://basicn587.macombserver.net/itwp2750/project-3/article.php?id=" . $row['id']);
} catch (Exception $e){
    header("Cache-Control: no-cache");
    header("Location: http://basicn587.macombserver.net/itwp2750/project-3/index.php"); //If an error occurs, just go back to the main page
}  
?>