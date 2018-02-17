<!DOCTYPE html>
<html lang="en">

<head>
    <title>EDIT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/theme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form method="post" action="_inc/save.php">
        <div class="page-header">
            <input name="person_name" placeholder="NORBERT BARTO">
        </div>



        <div class="container">
            <div class="jumbotron">
                <input name="company_name" placeholder="COMPANY NAME">
                <textarea style="margin-top: 20px" name="introduction" class="form-control" rows="6" placeholder="Hello, we are doing xxx "></textarea>
            </div>
        </div>



        <ul style="text-decoration: none">
            <li><input style="margin-bottom: 10px;" name="project_name" placeholder="My project"></li>
            <li><button class="btn-lg btn-danger" type="submit" name="submit">SAVE</button></li>
            <li><h2><a href="company1.html"> BACK</a></h2></li>
        </ul>


    </form>



<footer>
    <!--        copyright and stuff-->

</footer>
</div>
</body>

</html>


