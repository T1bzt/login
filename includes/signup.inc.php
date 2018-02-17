<?php

if (isset($_POST['submit'])) {

    include_once 'connection.php';

    $first = $_POST['first'];
    $last = $_POST['last'];
    $email =$_POST['email'];
    $uid =  $_POST['uid'];
    $pwd = $_POST['pwd'];

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_uid=?";
                $query = $pdo->prepare("$sql");
                $query->bindValue(1,$uid);
                $query->execute();
                $resultCheck = $query->rowCount();

                if ($resultCheck > 0) {
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                } else {
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?,?,?,?,?);";
                    $query = $pdo->prepare("$sql");
//                    mysqli_query($conn, $sql);
                    $query->bindValue(1,$first);
                    $query->bindValue(2,$last);
                    $query->bindValue(3,$email);
                    $query->bindValue(4,$uid);
                    $query->bindValue(5,$hashedPwd);

                    $query->execute();
                    // Desired folder structure
                    $structure = '../users/'.$uid.'/';

                    // To create the nested structure, the $recursive parameter
                    // to mkdir() must be specified.

                    if (!mkdir($structure, 0777, true)) {
                        die('Failed to create folders...');
                    }
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

} else {
    header("Location: ../signup.php");
    exit();
}