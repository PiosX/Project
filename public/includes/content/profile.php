<?php
session_start();
require ('../../../vendor/autoload.php'); 

    if(isset($_SESSION['email']) && isset($_SESSION['login']))
    {
        echo "Sesja aktywna.";
        var_dump($_SESSION);
        echo "Siemanko.";
    }
    if(isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        session_destroy();
        unset($_SESSION['email']);
        unset($_SESSION['login']);
        header("Location:../../index.php?action=logout");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../../css/profile.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Expanded&display=swap" rel="stylesheet">
</head>
<body>
    <div class="top-container">
        <a href="">Informations</a>
        <a href="">Chat</a>
        <a href="">Forum</a>
        <a href="profile.php">Profile</a>
        <button id="homeLog" onclick="location.href='?action=logout'">Logout</button>     
    </div>
    <div class="mid-container">
        
    </div>
</body>
</html>