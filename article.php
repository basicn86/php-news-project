<?php
    require("./header.php");
?>
    <?php
        //This code displays an article to the main page

        try {
            //Create the SQL statement that selects the article from the database
            //Using the GET method, get the desired article ID from the URL
            //The reason why I used the GET method here is because it'll make the article easy to link to.
            //If I used POST instead, it would be extremely difficult to create individual links to every article
            $sqlcommand = $sqlcommand = "SELECT * FROM articles WHERE id='";
            $sqlcommand = $sqlcommand . mysqli_real_escape_string($dbconnect, $_GET['id']) . "' LIMIT 1;";
            
            $query_result = mysqli_query($dbconnect, $sqlcommand); //execute the query

            //if an article was not retrieved, throw a 404 error to the user
            if($query_result == false){
                throw new Exception('404 article not found');
            }
            if(mysqli_num_rows($query_result) < 1){
                throw new Exception('404 article not found');
            }

            $row = mysqli_fetch_assoc($query_result); //fetch the row from the query result

            echo "<h1 class=\"article-title\">" . $row['title'] . "</h1>"; //display the article title
            echo "<p class=\"article-info\">Published by " . $row['author'] . " on " . $row['published'] . "</p>"; //display the author(s) and the date published
            $paragraphs = explode(PHP_EOL, $row['content']); //Separate each paragraph in the content by its EOL character
            foreach($paragraphs as $paragraph){ //Print each paragraph in its own <p> tag
                echo "<p class=\"article-paragraph\">" . $paragraph . "</p>";
            }

            echo "<p class=\"article-link\"><a href=" . $row['link'] . ">Original Link</a></p>"; //print the article link if the user wants to access the original article
        } catch (Exception $e){
            //Prints an error message in the form of an <h1> element
            echo "<h1 class=\"article-title\">";
            echo $e->getMessage();
            echo "</h1>";
        }
    ?>
    
    <?php include("./templates/validation_template.php")?>
</body>
</html>