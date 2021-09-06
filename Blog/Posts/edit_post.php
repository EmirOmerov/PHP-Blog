<?php

include("../Connection/db.php");

$id = $_GET['id'];
if (!$id) {
    header("Location: add_post.php");
}

$qry = mysqli_query($con, "select * from posts where postID='$id'");

$data = mysqli_fetch_array($qry);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $date = $_POST['datePost'];
    $content = $_POST['content'];
    if (isset($_FILES['pickImage']['name']) && ($_FILES['pickImage']['name'] != "")) {
        $imageName = $_FILES['pickImage']['name'];
        $imageSize = $_FILES['pickImage']['size'];
        $tmp_name = $_FILES['pickImage']['tmp_name'];
        unlink("uploads($oldImage");
        move_uploaded_file($tmp_name, "uploads/" . $imageName);
    } else {
        $imageName = $oldImage;
    }



    $edit = mysqli_query($con, "update posts set title='$title', datePost='$date', content='$content', imageURL='$imageName' where postID='$id'");

    if ($edit) {
        mysqli_close($con);
        echo "<script type='text/javascript'>alert('Post Updated');
             window.open('../Posts/blogList.php','_self');
             </script>";
        exit;
    } else {
        echo "Data not updated!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function removeImage() {
            document.getElementById('image').removeAttribute('src');

        }
    </script>
    <style type="text/css">
        .goBackButton {
            position: absolute;
            width: 7rem;
            height: 3rem;
            right: 5rem;
            top: 1.5rem;
            border-radius: 5px;
        }

        .header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 6rem;
            left: 0;
            padding-left: 40px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            background-color: black;
            font-family: 'Courier New', Courier, monospace;
        }

        .box {
            position: absolute;
            border: 2px solid lightblue;
            border-radius: 5px;
            top: 10rem;
            width: 50rem;
            left: 25%;
            height: auto;
        }

        .newBlogPostButton {
            position: absolute;
            width: 8rem;
            height: 3rem;
            right: 13rem;
            top: 1.5rem;
            border-radius: 5px;
            background-color: greenyellow;

        }

        .LogoutHeaderButton {
            position: absolute;
            width: 7rem;
            height: 3rem;
            right: 5rem;
            top: 1.5rem;
            border-radius: 5px;
        }

        .inputDate {
            position: absolute;
            right: 5rem;
            top: 5.5rem;
        }

        .dateLabel {
            position: absolute;
            right: 9rem;
            top: 3.9rem;
        }

        .titleLabel {
            position: relative;
            left: 3rem;
            font-size: 20px;
        }

        .inputTitle {
            width: 20rem;
            position: relative;
            left: 3rem;
        }

        .contentLabel {
            position: relative;
            left: 3rem;
            font-size: 20px;
            bottom: 3rem;
        }

        .inputContent {
            position: relative;
            width: 20rem;
            left: 3rem;
            bottom: 3rem;
            height: 10rem;
            padding-top: 0;
            margin-top: 0;
        }

        .saveButton {
            position: absolute;
            bottom: 2rem;
            left: 3rem;
        }

        .newBlogtitle {
            position: relative;
            left: 3rem;
        }

        #selectImage {
            position: absolute;
            right: 0;
            display: none;

        }

        .removeImage {
            position: relative;
        }

        #image {
            position: absolute;
            border: 2px solid lightblue;
            border-radius: 3px;
            width: 200px;
            height: 160px;
            right: 4rem;
            bottom: 4.5rem;
        }

        .imageLabel {
            position: absolute;
            right: 6rem;
            font-size: 20px;
            bottom: 15rem;
        }

        .imagePickLabel {
            position: absolute;
            right: 11.5rem;
            bottom: 3rem;
        }

        .imageRemoveLabel {
            position: absolute;
            right: 4rem;
            bottom: 3rem;
            border: none;
            background-color: transparent;
            color: red;

        }
    </style>



</head>

<body>
    <div class="header">
        <?php include '../header.php'; ?>
    </div>
    <div class="box">
        <h2 class="newBlogtitle">New Blog Post</h2>
        <form method="POST" enctype="multipart/form-data">
            <label class="titleLabel">Title:</label><br>
            <input class="inputTitle" value="<?php echo $data['title'] ?>" type="text" name="title"><br><br>
            <label class="dateLabel" style="font-size:20px;">Date:</label><br>
            <input class="inputDate" type="date" name="datePost" value="<?php echo $data['datePost'] ?>"><br><br>
            <label class="contentLabel">Content:</label><br>
            <textarea class="inputContent" maxlength="5000" type="text" name="content"><?php echo $data['content'] ?></textarea><br>
            <label class="imageLabel">Featured Image:</label><br>
            <img id='image' src="../uploads/<?php echo $data['imageURL']; ?>">
            <input accept="image/*" onchange="preview_image(event)" id="selectImage" type="file" name="pickImage">
            <label class="imagePickLabel" for="selectImage">Select Image</label>
            <button class="saveButton" type="submit" name="update">Save</button>
        </form>
        <button onclick="removeImage()" class="imageRemoveLabel" name="removePreview" value="Remove Image">Remove Image</button>
    </div>
</body>

</html>