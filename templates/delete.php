<?php
    include_once "edit.php";

?>
<form id="delete-form" class="col-sm-6" action="_inc/delete-item.php" method="post" >

    <p class="form-group">
        <input type="hidden" name="id" value=<?php echo $_GET['id'] ?>>

        <span class="controls">
                <input class="btn-sm btn-danger" type="submit" value="delete item">
                <a href="<?php echo '../index.php' ?>" class="back-link text-muted">back</a>
            </span>
    </p>
</form>

<script>

    $("#delete-form").appendTo("#question");

</script>


