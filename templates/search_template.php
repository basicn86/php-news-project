<!--
    This is the search template page.
    It allows you to paste this form into any page using the include(); function
    It also has sticky values, so if you submit the form, the values will stay.
-->

<form class="search" method="POST" action="./search.php">
        <p><input type="text" name="search_term" size="64" value="<?php if(isset($_POST['search_term'])) {echo $_POST['search_term'];} ?>"></p>
        <p>
            <label>Title</label><input type="checkbox" name="title" <?php if(isset($_POST['title'])) {echo 'checked';} ?>>
            <label>Author</label><input type="checkbox" name="author" <?php if(isset($_POST['author'])) {echo 'checked';} ?>>
            <label>Content</label><input type="checkbox" name="content" <?php if(isset($_POST['content'])) {echo 'checked';} ?>>
            <label>Date</label><input type="checkbox" name="date" <?php if(isset($_POST['date'])) {echo 'checked';} ?>>
        </p>
        <p><input class="submit-button" type="submit" name="submit" value="Search&excl;"></p>
</form>