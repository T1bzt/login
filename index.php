<?php
include_once 'partials/header.php'
?>

<section class="main-container">
    <div class="main-wrapper">

        <?php
            if (isset($_SESSION['u_id'])) {
                echo "You are logged in: " . $_SESSION['u_first'];
                echo '
                <br>
                <h3>Available templates: </h3>
                <ul>
                <li class="list-group-item"><h6><a href="templates/company1.html?web_type=container">Company theme</a></h6></li>
                <li class="list-group-item"><h6><a href="templates/designer.php?web_type=designer">Designer theme</a></h6></li>
                </ul>
                <h3>Your websites: </h3>
                ';

                $sql = "SELECT * FROM `websites` INNER JOIN users on users.user_id=websites.user_id WHERE websites.user_id=?;";
                $query = $pdo->prepare("$sql");
                $query->bindValue(1, $_SESSION['u_id']);
                $query->execute();
                echo '<ul id="item-list" class="list-group col-sm-9">';
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo '<li id="item-'.$row['website_id'].'" class="list-group-item ">';
                    echo  $row['project_name'];
                    echo ' <div class="controls pull-right"> ';
                    echo ' <a href="templates/edit.php?id=' .$row['website_id']. '&type=' .$row['web_type'].'" class="edit-link">Edit</a> ';
                    echo ' <a href="templates/delete.php?id=' .$row['website_id']. '" class="delete-link">Delete</a> ';
                    echo '     </div>';
                    echo '  </li>';
                }
                echo '</ul>';
            }else {
                echo '<h3>some before login page... </h3>';
            }
        ?>
    </div>
</section>

<?php
include_once 'partials/footer.php'
?>
