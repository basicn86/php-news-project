<?php
    require('./admin_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 3 Admin</title>
    <link href="./admin.css" rel="stylesheet">
</head>
<body>

    <h1>Post an Article</h1>
    <form method="POST" action="./upload_article.php">
        <p><label>Link&colon;</label><input name="link" type="text"></p>

        <p><label>Author&colon;</label><input type="text" name="author" size="64"></p>

        <p><label>Publication Date&colon;</label><input name="date" type="date"></p>

        <p><label>Title&colon;</label></p>
        <textarea name="title" rows="4" cols="50"></textarea>

        <p><label>Article Content&colon;</label></p>
        <textarea name="content" rows="4" cols="50"></textarea>

        <p><input type="submit" name="submit" value="Post it&excl;"></p>
    </form>

    <h1>Delete an Existing Article</h1>
    <form method="POST" action="./delete_article.php">
        <p><label>Article ID&colon;</label><input type="text" name="article_no" size="64"></p>
        <p><input class="delete-button" type="submit" name="submit" value="Delete&excl;"></p>
    </form>

    <h1>View Existing Articles &lpar;10&rpar;</h1>
    <?php
        include('./view_articles.php');
    ?>
</body>
</html>