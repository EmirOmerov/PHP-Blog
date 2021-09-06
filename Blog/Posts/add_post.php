<?php
session_start();
include("Connection/db.php");
if ($_SESSION["username"] == NULL) {
    header("Location: ../Connection/admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
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
            right: 6rem;
            top: 5.5rem;
        }

        .dateLabel {
            position: absolute;
            right: 10rem;
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
            bottom: 4rem;
            left: 3rem;
            width: 4rem;
            background-color: lightblue;
        }

        .saveButton:hover {
            background-color: lightseagreen;
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
            border: 2px solid blue;
            width: 200px;
            height: 160px;
            right: 4rem;
            bottom: 6.5rem;
        }

        .imageLabel {
            position: absolute;
            right: 6rem;
            font-size: 20px;
            bottom: 17rem;
        }

        .imagePickLabel {
            position: absolute;
            right: 11.5rem;
            bottom: 5rem;
        }

        .imageRemoveLabel {
            position: absolute;
            right: 4rem;
            bottom: 5rem;
            border: none;
            background-color: transparent;
            color: red;

        }

        .goBackButton {
            position: absolute;
            bottom: 4rem;
            left: 8rem;
            width: 4rem;
            background-color: lightcoral;

        }

        .goBackButton:hover {
            background-color: red;
        }
    </style>

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
</head>

<body>
    <?php if (isset($_GET['error'])) : ?>
        <p><?php echo $_GET['error']; ?></p>

    <?php endif ?>
    <div class="container">
        <div class="header">
            <?php include('../header.php'); ?>
        </div>

        <div class="box">
            <h2 class="newBlogtitle">New Blog Post</h2>
            <form method="POST" action="../functions/insert.php" enctype="multipart/form-data">
                <label class="titleLabel">Title:</label><br>
                <input class="inputTitle" minlength="3" type="text" name="title"><br><br>
                <label class="dateLabel" style="font-size:20px;">Date:</label><br>
                <input class="inputDate" type="date" name="datePost"><br><br>
                <label class="contentLabel">Content:</label><br>
                <textarea class="inputContent" rows="5" cols="50" type="text" name="content"></textarea><br>
                <label class="imageLabel">Featured Image:</label><br>
                <img id="image" alt="Image Display Here" src="#" /> <br>
                <input accept="image/*" onchange="preview_image(event)" id="selectImage" type="file" name="pickImage">
                <label class="imagePickLabel" for="selectImage">Select Image</label>
                <button class="saveButton" type="submit" name="submit">Save</button>
            </form>
            <button class="goBackButton" onclick="history.go(-1);">Back </button>
            <button onclick="removeImage()" class="imageRemoveLabel" name="removePreview" value="Remove Image">Remove Image</button>
        </div>
    </div>

</body>

</html>