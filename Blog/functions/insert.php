<?php
include('../Connection/db.php');
if (!$con) {
    die("Error: Could not connect." . mysqli_connect_error());
}
if (!mysqli_select_db($con, 'blog')) {
    echo " Database Not Selected";
}
$title = $_POST['title'];
$datePost = $_POST['datePost'];
$content = $_POST['content'];
//image handling
$imageName = $_FILES['pickImage']['name'];
$imageSize = $_FILES['pickImage']['size'];
$tmp_name = $_FILES['pickImage']['tmp_name'];
$error = $_FILES['pickImage']['error'];

if ($error === 0) {
    if ($imageSize > 555000) {
        $em = "Sorry you file is too large";
        header("Location:../Posts/add_post.php?error=$em");
        die();
    } else {
        $img_ex = pathinfo($imageName, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowedExt = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowedExt)) {
            $newImageName = $img_ex_lc;
            $img_upload_path = '../uploads/' . $newImageName;
            move_uploaded_file($tmp_name, $img_upload_path);
        } else {
            $em = "You can't upload files of this type";
            header("Location:../Posts/add_post.php?error=$em");
            die();
        }
    }
}

$query = "INSERT INTO posts (title,datePost,content,imageURL) VALUES ('$title','$datePost','$content','$newImageName')";

if (!mysqli_query($con, $query)) {
    echo "<script type='text/javascript'>alert('Post not Inserted!');
    window.location='../Posts/blogList.php';
    </script>";
} else {
    echo "<script type='text/javascript'>alert('Post Inserted');
    window.location='../Posts/blogList.php';
    </script>";
    die();
}
