<?php require('header.php'); ?>

    <h1 class="article-title">Detroit News&excl;</h1>

    <img class="center-image" src="./detroit.jpg" title="Detroit" alt="Detroit">

    <h1 class="article-title">Search</h1>
    <?php include("./templates/search_template.php") //Includes the search form inside the main page ?>

    <h1 class="article-title">Latest News</h1>

    <?php
    try{
    //This code select 3 random articles and displays it on the front page for the user to click on

    //Select 3 random articles
    $sqlcommand = $sqlcommand = "SELECT * FROM articles ORDER BY rand() LIMIT 3";

    $query_result = mysqli_query($dbconnect, $sqlcommand); //execute the query

    //if an error occurs, just throw an exception
    if($query_result == false){
        throw new Exception('no articles');
    }
    if(mysqli_num_rows($query_result) < 1){
        throw new Exception('no articles');
    }

    //Loop through each article and display it to the user
    while($row = mysqli_fetch_assoc($query_result)){
        echo "<p class=\"search-result\"><a href=\"./article.php?id={$row['id']}\">" . $row['title'] . " (" . $row['published'] . ", " . $row['author'] . ")</a></p>";
    }
    
    
    } catch (Exception $e){
        //No need for error reporting here!
    }  
    ?>

    <?php include("./templates/validation_template.php") //includes the validation links inside the main page ?>
</body>
</html>