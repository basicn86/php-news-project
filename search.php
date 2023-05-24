<?php
require("./header.php"); //This is REQUIRED, or else this page won't work. Not recommended to use include(); because include(); does not stop the script in case this fails.
?>
    <h1 class="article-title">Search</h1>

    <?php include("./templates/search_template.php") //This includes the search form ?>

    <?php
    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sqlcommand = "SELECT * FROM articles WHERE "; //Start the SQL command

            $valid = false;

            $search_term = mysqli_real_escape_string($dbconnect, $_POST['search_term']); //Sanitize the search term

            if(isset($_POST['title'])){ //If the title is checked, include the title in the search
                $valid = true;
                $sqlcommand = $sqlcommand . "title LIKE '%$search_term%' ";
            }
            if(isset($_POST['author'])){//If the author is checked, include the author in the search
                if($valid){ //If a previous checkbox is already checked, make sure to include an 'or' so that multiple conditions can be chained together
                    $sqlcommand = $sqlcommand . "or ";
                }
                $valid = true;
                $sqlcommand = $sqlcommand . "author LIKE '%$search_term%' ";
            }
            if(isset($_POST['content'])){ //If the content is checked, include the content in the search
                if($valid){ //If a previous checkbox is already checked, make sure to include an 'or' so that multiple conditions can be chained together
                    $sqlcommand = $sqlcommand . "or ";
                }
                $valid = true;
                $sqlcommand = $sqlcommand . "content LIKE '%$search_term%' ";
            }
            if(isset($_POST['date'])){ //If the date is checked, include the date in the search
                if($valid){ //If a previous checkbox is already checked, make sure to include an 'or' so that multiple conditions can be chained together
                    $sqlcommand = $sqlcommand . "or ";
                }
                $valid = true;
                $sqlcommand = $sqlcommand . "published LIKE '%$search_term%' ";
            }

            if(!$valid){ //If no option is selected, go to the catch block and display the error
                throw new Exception("No option selected");
            }

            
            $sqlcommand = $sqlcommand . "LIMIT 10;"; //limit the search results to 10 to keep the database from clogging

            $query_result = mysqli_query($dbconnect, $sqlcommand); //execute the query

            if($query_result == false){ //mysqli_query will return false if an error occurs in the sql statement. When this happens, just throw an exception. 
                throw new Exception('No Articles Found');
            }
            if(mysqli_num_rows($query_result) < 1){ //if no articles are found, just throw an exception.
                throw new Exception('No Articles Found');
            }

            echo "<h1 class=\"article-title\">Search Results (" . mysqli_num_rows($query_result) . ")</h1>"; //print how many matching results were found
            while($row = mysqli_fetch_assoc($query_result)){
                //print each article in a clickable link
                echo "<p class=\"search-result\"><a href=\"./article.php?id={$row['id']}\">" . $row['title'] . " (" . $row['published'] . ", " . $row['author'] . ")</a></p>";
            }
        } 
    }catch (Exception $e){
        //If an error occurs in the try block, then skip all the code in the try block and print the error in the catch block
        echo "<h1 class=\"article-title\">" . $e->getMessage() . "</h1>";
    }
    ?>

    <?php include("./templates/validation_template.php")?>
</body>
</html>