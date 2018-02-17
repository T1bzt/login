<?php
include_once "../../includes/connection.php";
session_start();

if(!isset($_SESSION['u_id'])){
    header('Location: ../../includes/signup.inc.php');
    die();
}
// to not add 'default'
if (isset($_POST['project_name'])) {
    isset($_POST['introduction']) ? $introduction = $_POST['introduction'] : $introduction = "default";
    isset($_POST['company_name']) ? $company_name = $_POST['company_name'] : $company_name = "default";
    isset($_POST['person_name']) ? $person_name = $_POST['person_name'] : $person_name = "default";
    isset($_POST['project_name']) ? $project_name = $_POST['project_name'] : $project_name = "default";
    isset($_POST['web_type']) ? $web_type = $_POST['web_type'] : $web_type = "default";

    $sql = "INSERT INTO websites (company_name, introduction, first_name, project_name, web_type, user_id) VALUES (?,?,?,?,?,?);";
    $query = $pdo->prepare("$sql");

    $query->bindValue(1, $company_name);
    $query->bindValue(2, $introduction);
    $query->bindValue(3, $person_name);
    $query->bindValue(4, $project_name);
    $query->bindValue(5, $web_type);
    $query->bindValue(6, $_SESSION['u_id']);

    $query->execute();
    $structure = "../../users/" . $_SESSION['u_uid'] ."/".$project_name."/";
    if (!mkdir($structure, 0777, true)) {
        die('Failed to create folders...');
    }
    $structure = "../../users/" . $_SESSION['u_uid'] ."/".$project_name."/"."css/";
    if (!mkdir($structure, 0777, true)) {
        die('Failed to create folders...');
    }
    $structure = "../../users/" . $_SESSION['u_uid'] ."/".$project_name."/"."/js";
    if (!mkdir($structure, 0777, true)) {
        die('Failed to create folders...');
    }

    $url = "../../users/" . $_SESSION['u_uid'] ."/".$project_name."/"."/index.html";
    $html_file = fopen($url, "w") or die("Unable to open file!");
    $html_code = "
<!DOCTYPE html>    
<html>
<head>
<title>W3.CSS Template</title>
<meta charset=\"UTF-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<link rel=\"stylesheet\" href=\"https://www.w3schools.com/w3css/4/w3.css\">
<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Lato\">
<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Montserrat\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
<link rel=\"stylesheet\" href=\"css/designer.css\">
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script src=\"js/designer.js\"></script>
</head>

<body>


<!-- Header -->
<header class=\"w3-container w3-red w3-center\" style=\"padding:128px 16px\">
    <h1 class=\"w3-margin w3-jumbo \" id=\"title\"  data-popup-open=\"popup-1\">".$company_name."</h1>
    <p class=\"w3-xlarge\" id=\"paragraph\" data-popup-open=\"popup-1\">".$introduction."</p>
</header>

<!-- First Grid -->
<div class=\"w3-row-padding w3-padding-64 w3-container\">
    <div class=\"w3-content\">
        <div class=\"w3-twothird\">
            <h1  data-popup-open=\"popup-1\">Lorem Ipsum</h1>
            <h5 class=\"w3-padding-32\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>

            <p class=\"w3-text-grey\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <div class=\"w3-third w3-center\">
            <i class=\"fa fa-anchor w3-padding-64 w3-text-red\"></i>
        </div>
    </div>
</div>

<!-- Second Grid -->
<div class=\"w3-row-padding w3-light-grey w3-padding-64 w3-container\">
    <div class=\"w3-content\">
        <div class=\"w3-third w3-center\">
            <i class=\"fa fa-coffee w3-padding-64 w3-text-red w3-margin-right\"></i>
        </div>

        <div class=\"w3-twothird\">
            <h1>Lorem Ipsum</h1>
            <h5 class=\"w3-padding-32\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>

            <p class=\"w3-text-grey\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</div>

<div class=\"w3-container w3-black w3-center w3-opacity w3-padding-64\">
    <h1 class=\"w3-margin w3-xlarge\">Quote of the day: live life</h1>
</div>

<!-- Footer -->
<footer class=\"w3-container w3-padding-64 w3-center w3-opacity\">
    <div class=\"w3-xlarge w3-padding-32\">
        <i class=\"fa fa-facebook-official w3-hover-opacity\"></i>
        <i class=\"fa fa-instagram w3-hover-opacity\"></i>
        <i class=\"fa fa-snapchat w3-hover-opacity\"></i>
        <i class=\"fa fa-pinterest-p w3-hover-opacity\"></i>
        <i class=\"fa fa-twitter w3-hover-opacity\"></i>
        <i class=\"fa fa-linkedin w3-hover-opacity\"></i>
    </div>

</footer>


</body>
</html>
";
    fwrite($html_file, $html_code);
    fclose($html_file);

    $url = "../../users/" . $_SESSION['u_uid'] . "/". $project_name. "/css/designer.css";
    $css_file = fopen($url, "w") or die("Unable to open file!");
    $css_code = "
    /* Outer */
body,h1,h2,h3,h4,h5,h6 {font-family: \"Lato\", sans-serif}
.w3-bar,h1,button {font-family: \"Montserrat\", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
#title, #paragraph {
    cursor: pointer;
}

.popup {
    width:100%;
    height:100%;
    display:none;
    position:fixed;
    top:0px;
    left:0px;
    background:rgba(0,0,0,0.75);
}

/* Inner */
.popup-inner {
    max-width:700px;
    width:90%;
    padding:40px;
    position:absolute;
    top:50%;
    left:50%;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(-50%, -50%);
    box-shadow:0px 2px 6px rgba(0,0,0,1);
    border-radius:3px;
    background:#fff;
}

/* Close Button */
.popup-close {
    width:30px;
    height:30px;
    padding-top:4px;
    display:inline-block;
    position:absolute;
    top:0px;
    right:0px;
    transition:ease 0.25s;
    -webkit-transform:translate(50%, -50%);
    transform:translate(50%, -50%);
    border-radius:1000px;
    background:rgba(0,0,0,0.8);
    font-family:Arial, Sans-Serif;
    font-size:20px;
    text-align:center;
    line-height:100%;
    color:#fff;
}

.popup-close:hover {
    -webkit-transform:translate(50%, -50%) rotate(180deg);
    transform:translate(50%, -50%) rotate(180deg);
    background:rgba(0,0,0,1);
    text-decoration:none;
}
input{
    padding: 0 10px;
    border: 1px solid darkgray;
}
    ";
      fwrite($css_file, $css_code);
    fclose($css_code);
}

header('Location: ../../index.php?save=success');