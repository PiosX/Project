<?php
session_start();
require ('../../../vendor/autoload.php'); 

    if(isset($_SESSION['email']))
    {
        echo "Sesja aktywna.";
        var_dump($_SESSION);
    }
    if(isset($_SESSION['login']))
    {
        echo "Siemanko.";
    }
?>