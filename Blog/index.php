<?php
session_start();
include("Connection/db.php");
?>

<!DOCTYPE html>
<html>

<head>

    <script src="https://kit.fontawesome.com/46e89b9995.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body::-webkit-scrollbar {
            display: none;
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
            z-index: 99;
        }

        .blogContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            top: 10rem;
            position: relative;
            text-align: left;
            left: 10%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .LoginHeaderButton {
            position: absolute;
            width: 7rem;
            height: 3rem;
            right: 5rem;
            top: 1.5rem;
            border-radius: 5px;

        }
    </style>
</head>

<body>
    <div class="indexContainer">
        <div class="header">
            <?php include 'header.php'; ?>
        </div>
        <div class="blogContainer">
            <?php
            $sql = "select * from posts ;";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h1 style='text-decoration:underline;'>" . strtoupper($row['title']) . "</h3>";
                    echo "<img height='300px' width='400px' src='uploads/" . $row['imageURL'] . "'>";
                    echo "<h3 style='margin-bottom:0';> Date: " . $row['datePost'] . "</h3>";
                    echo "<h3>" . $row['content'] . "</h3><br><br><br>";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>