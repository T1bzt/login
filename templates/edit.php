<?php
session_start();
include_once "../includes/connection.php";
if (isset($_SESSION['u_id'])) {
    include_once "designer.php";

    $sql = "SELECT * FROM `websites` INNER JOIN users on users.user_id=websites.user_id WHERE websites.user_id=? and website_id=?;";
    $query = $pdo->prepare("$sql");
    $query->bindValue(1, $_SESSION['u_id']);
    $query->bindValue(2, $_GET['id']);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
}
?>
<script>
    $("#title").text("<?php echo $data['company_name'] ?>");
    $("#paragraph").text("<?php echo $data['introduction'] ?>");

</script>


