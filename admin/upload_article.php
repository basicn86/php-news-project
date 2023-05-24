<?php require('./admin_db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sqlcommand = "INSERT INTO basicn587_news.articles VALUES(";

    $sqlcommand = $sqlcommand . "default, ";
    $sqlcommand = $sqlcommand . "'" . mysqli_real_escape_string($dbconnect, $_POST['title']) . "', ";
    $sqlcommand = $sqlcommand . "'" . mysqli_real_escape_string($dbconnect, $_POST['link']) . "', ";
    $sqlcommand = $sqlcommand . "'" . mysqli_real_escape_string($dbconnect, $_POST['author']) . "',";
    $sqlcommand = $sqlcommand . "'" . mysqli_real_escape_string($dbconnect, $_POST['content']) . "',";
    $sqlcommand = $sqlcommand . "'" . mysqli_real_escape_string($dbconnect, $_POST['date']) . "')";

    mysqli_query($dbconnect, $sqlcommand) or
    die(mysqli_error($dbconnect));
    header("Location: http://basicn587.macombserver.net/itwp2750/project-3/admin/admin.php");
} else {
    echo 'Failed to post';
}

?>