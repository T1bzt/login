<?php
include_once "../../includes/connection.php";
session_start();

if(!isset($_SESSION['u_id'])){
    header('Location: ../../includes/signup.inc.php');
    die();
}
print_r($_POST);

$person_name = $_POST['person_name'];
$company_name = $_POST['company_name'];
$introduction = $_POST['introduction'];
$project_name = $_POST['project_name'];
$website_id = $_POST['website_id'];
isset($_POST['web_type']) ? $web_type = $_POST['web_type'] : $web_type="default";

$sql = "UPDATE website SET company_name =?, introduction=?, first_name=?, project_name=? where website_id=? ";
$query = $pdo->prepare("$sql");

$query->bindValue(1,$company_name);
$query->bindValue(2,$introduction);
$query->bindValue(3,$person_name);
$query->bindValue(4,$project_name);
$query->bindValue(5,$website_id);

$query->execute();

//header('Location: ../../index.php?save=success');