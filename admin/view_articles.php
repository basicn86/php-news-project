<?php
    require('./admin_db.php');

$sqlcommand = "SELECT * FROM articles LIMIT 10";
$query_result = mysqli_query($dbconnect, $sqlcommand);

while($row = mysqli_fetch_assoc($query_result)){
    echo "<p class=\"article-link\"><a href=\"http://basicn587.macombserver.net/itwp2750/project-3/article.php?id={$row['id']}\">{$row['title']}</a></p>";
}
?>