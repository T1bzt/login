<?php
    include_once "../../includes/connection.php";
    session_start();
    if (isset($_SESSION)) {
        $sql = "delete  FROM `websites`  WHERE  website_id=?;";
        $query = $pdo->prepare("$sql");
        $query->bindValue(1, $_POST['id']);
        $query->execute();
    }

header('Location: ../../index.php');
