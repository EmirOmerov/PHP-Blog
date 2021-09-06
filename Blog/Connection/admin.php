<?php
session_start();
include("db.php");
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
            top: 14rem;
            padding-top: 30px;
            position: absolute;
            align-items: center;
            border: 4px solid black;
            border-radius: 5px;
            width: 20rem;
            height: 10rem;
            text-align: center;
            left: 40%;
            font-size: 15px;
            padding-bottom: 0;
            padding-top: 1rem;

        }

        .AdminHeaderButton {
            position: absolute;
            width: 7rem;
            height: 3rem;
            right: 5rem;
            top: 1.5rem;
            border-radius: 5px;
        }

        .buttonLogin {
            position: relative;
            top: 1rem;
            border: 2px solid black;
            border-radius: 3px;
            height: 2rem;
            width: 8rem;
        }

        .buttonLogin:hover {
            background-color: lightblue;

        }

        .inputUserName {
            border: 2px solid black;
            border-radius: 2px;
            margin-bottom: 10px;
        }

        .inputPassword {
            border: 2px solid black;
            border-radius: 2px;

        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <?php include '../header.php'; ?>
        </div>
        <?php
        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            //filter for security protection


            $username = strip_tags(mysqli_real_escape_string($con, trim($username)));
            $password = strip_tags(mysqli_real_escape_string($con, trim($password)));


            $sql = $con->query("SELECT * FROM users WHERE username='" . $username . "'");
            if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                $_SESSION['userID'] = $data['userID'];
                $_SESSION["username"] = $data['username'];
                $_SESSION["password"] = $data['password'];
                if ((password_verify($password, $data['password']))) {
                    header("Location:../Posts/blogList.php");
                    die();
                } else {
                    echo "<script type='text/javascript'>alert('Check Your inputs!');</script>";
                }
            }
        }

        ?>
        <div class="box">
            <form method="POST">
                <label style="font-size:20px;">Username:</label><br>
                <input class="inputUserName" minlength="3" type="text" name="username"><br>
                <label style="font-size:20px;">Password:</label><br>
                <input class="inputPassword" minlength="5" type="password" name="password"><br>
                <button class="buttonLogin" type="submit" name="submit">Proceed to login</button>
            </form>
        </div>
    </div>

</body>

</html>