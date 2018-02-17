<?php
session_start();
include_once "includes/connection.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My CMS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
<!--    <link rel="stylesheet" href="theme.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->


</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a> </li>
            </ul>

            <div class="nav-login">
                <?php
                    if(isset($_SESSION['u_id'])){
                        echo
                        '<form action="includes/logout.inc.php" method="post">
                         <button type="submit" name="submit">Logout</button>
                         </form>'
                        ;
                    }else {
                        echo
                        '<form action="includes/login.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Username/e-mail">
                        <input type="password" name="pwd" placeholder="password">
                        <button type="submit" name="submit">Login</button>
                        </form>
                        <a href="signup.php">Sign up</a>'
                        ;
                    }
                ?>
            </div>
        </div>
    </nav>
</header>