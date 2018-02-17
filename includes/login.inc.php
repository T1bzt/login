<?php

session_start();

if (isset($_POST['submit'])) {

    include 'connection.php';

    $uid = $_POST['uid'];

    $pwd = $_POST['pwd'];


    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid=? OR user_email=?";
        $query = $pdo->prepare("$sql");
        $query->bindValue(1,$uid);
        $query->bindValue(2,$pwd);
        $query->execute();
        $resultCheck = $query->rowCount();

        if ($resultCheck < 1) {
            header("Location: ../index.php?login=errorResultCheck<1");
            exit();
        } else {
//            if ($row = mysqli_fetch_assoc($result)) {
            if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
//                die(print_r($row));

                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?login=errorpassword");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php?login=error222");
    exit();
}