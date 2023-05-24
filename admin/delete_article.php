<?php require('./admin_db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sqlcommand = "SELECT * FROM articles WHERE id='";
    $sqlcommand = $sqlcommand . mysqli_real_escape_string($dbconnect, $_POST['article_no']) . "' LIMIT 1;";

    $query_result = mysqli_query($dbconnect, $sqlcommand);

    if($query_result == false){
        die("Article does not exist!");
    }

    if(mysqli_num_rows($query_result) < 1){
        die("Article does not exist!");
    }

    $article_title = mysqli_fetch_assoc($query_result)['title'];

    $sqlcommand = "DELETE FROM articles WHERE id='";
    $sqlcommand = $sqlcommand . mysqli_real_escape_string($dbconnect, $_POST['article_no']) . "' LIMIT 1;";
    
    mysqli_query($dbconnect, $sqlcommand) or
    die(mysqli_error($dbconnect));
    header("Location: http://basicn587.macombserver.net/itwp2750/project-3/admin/admin.php");
} else {
    echo 'Failed to delete';
}

?>