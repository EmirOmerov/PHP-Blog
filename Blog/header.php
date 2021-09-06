<?php

if ($_SERVER["PHP_SELF"] == "/Blog/index.php") {
    echo "<h1>Just a Blog...</h1>";
    echo "<form action='Connection/admin.php' method='POST'>
    <button class='LoginHeaderButton' type='submit'>Login</button>
   </form> ";
} elseif ($_SERVER["PHP_SELF"] == "/Blog/Connection/admin.php") {
    echo "<h1>Login In...</h1>";
    echo "<form action='index.php' method='POST'>
     <button class='AdminHeaderButton' type='submit'>...to Blog</button>
</form> ";
} elseif ($_SERVER["PHP_SELF"] == "/Blog/Posts/blogList.php") {
    echo "<h1>Blog Managment...</h1>";
    echo "<form action='../functions/logout.php' method='POST'>
     <button class='LogoutHeaderButton' type='submit'>Logout</button>
</form> ";
    echo "<form action='../Posts/add_post.php' method='POST'>
<button class='newBlogPostButton' type='submit'>
<i class='fas fa-pen'></i>" . " " . "New Blog Post</button>
</form> ";
} elseif ($_SERVER["PHP_SELF"] == "/Blog/Posts/add_post.php") {
    echo "<h1>Blog Managment...</h1>";
    echo "<form action='../functions/logout.php' method='POST'>
     <button class='LogoutHeaderButton' type='submit'>Logout</button>
</form> ";
    echo "<form action='' method='POST'>
<button class='newBlogPostButton' type='submit'>
<i class='fas fa-pen'></i>" . " " . "New Blog Post</button>
</form> ";
} elseif ($_SERVER["PHP_SELF"] == "/Blog/Posts/post.php") {
    echo "<h1>Post...</h1>";
    echo "<form action='../Posts/blogList.php' method='POST'>
     <button class='goBackButton' type='submit'>Go Back</button>
</form> ";
} elseif ($_SERVER["PHP_SELF"] == "/Blog/Posts/edit_post.php") {
    echo "<h1>Edit Post...</h1>";
    echo "<form action='blogList.php' method='POST'>
     <button class='goBackButton' type='submit'>Go Back</button>
</form> ";
}
