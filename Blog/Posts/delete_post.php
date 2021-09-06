<?php
include("../Connection/db.php");

$sql = "DELETE FROM posts WHERE postID='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    echo "<script type='text/javascript'>alert('Post Deleted');
    window.location='../Posts/blogList.php';
    </script>";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($conn);
