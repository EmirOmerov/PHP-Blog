<?php
include("../Connection/db.php");
$id = $_GET['id'];


$qry = mysqli_query($con, "select * from posts where postID='$id'");
$data = mysqli_fetch_array($qry);
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            height: auto;
            left: 0;
            padding-left: 40px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            background-color: black;
            font-family: 'Courier New', Courier, monospace;
        }

        .box {
            display: flex;
            text-align: center;
            flex-direction: column;
            position: absolute;
            border: 3px solid lightblue;
            top: 10rem;
            width: 53rem;
            left: 22%;
            height: auto;
            border-radius: 3px;
        }



        #image {
            margin-top: 1rem;
            position: relative;
            border: 2px solid blue;
            width: 200px;
            height: 160px;
            left: 20rem;
            top: 0rem;
        }

        .contentContainer {
            position: relative;
            width: 35rem;
            left: 9rem;
            bottom: 1rem;
            margin: 0;
        }

        .Title {
            position: absolute;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <?php include('../header.php'); ?>
        </div>

        <div class="box">
            <img id='image' src="../uploads/<?php echo $data['imageURL']; ?>">
            <h1 style="text-decoration:underline;"> <?php echo $data['title'] ?></h1>
            <h4>Date: <?php echo $data['datePost'] ?></h4>
            <h3 class="contentContainer"><?php echo $data['content'] ?></h3>
        </div>
    </div>

</body>

</html>