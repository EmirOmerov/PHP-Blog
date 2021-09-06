<?php

include("../Connection/db.php");
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
        .LogoutHeaderButton {
            position: absolute;
            width: 7rem;
            height: 3rem;
            right: 5rem;
            top: 1.5rem;
            border-radius: 5px;
        }

        .labelContainer {
            position: relative;
            top: 12rem;
            border: 2px solid lightblue;
            width: 50rem;
            height: 3rem;
            left: 21%;
            border-bottom: 2px solid lightblue;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            text-align: left;
            padding-left: 2rem;
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

        .titleContent {
            position: relative;
            left: 0rem;
            margin: 0;
            width: auto;
            padding-left: 5px;
        }

        .dateContent {
            position: relative;
            right: 15rem;
            margin: 0;
            width: 6rem;

        }

        .rowContent {
            position: relative;
            left: 21%;
            top: 12rem;
            border-top: 0;
            width: 50rem;
            height: 3rem;
            border-right: 2px solid lightblue;
            border-left: 2px solid lightblue;
            border-bottom: 2px solid lightblue;

        }

        .BPLContant {
            position: absolute;
            top: 9rem;
            left: 22%;

        }

        .actionContent {
            position: relative;
            right: 2rem;
            margin: 0;
            width: 6rem;

        }

        .tableDateContainer {
            position: relative;
            left: 7.5rem;
        }

        .tableActionsContainer {
            position: relative;
            left: 12rem;
        }

        .rowContent td i+i {
            padding-left: 10px;

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
    </style>
</head>


<body>
    <div class="indexContainer">
        <div class="header">
            <?php include '../header.php'; ?>
        </div>
        <?php
        $sql = "SELECT * FROM posts ;";
        $result = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);
        echo "<h3 class='BPLContant'>Blog Post List</h3>";
        echo '
        <table class="labelContainer">
        <tr>
        <th>TITLE</th>
        <th class="tableDateContainer">DATE</th>
        <th class="tableActionsContainer">ACTIONS</th>
        </tr>
        </table>
        ';

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <table class='rowContent'>
                    <tr>
                        <td class='titleContent'><?php echo $row['title']; ?></td>
                        <td class='dateContent'><?php echo $row['datePost']; ?> </td>
                        <td class='actionContent'>
                            <a href='post.php?id=<?php echo $row['postID']; ?>'><i class='fas fa-globe-europe'></i></a>
                            <a href='edit_post.php?id=<?php echo $row['postID']; ?>'><i class='fas fa-pen'></i></a>
                            <a onclick="return confirm('Are you sure?')" href='delete_post.php?id=<?php echo $row['postID']; ?>'><i class='fas fa-trash-alt'></i></a>.
                        </td>
                    </tr>
                </table>
        <?php
            }
        }
        ?>
    </div>

</body>

</html>