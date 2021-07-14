<?php
    require ('../../vendor/autoload.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/regstyle.css" />
    <script src="../javascript/randomEye.js"></script>
</head>
<body>
    <div class="eye">
        <div class="eyelid">
            <span></span>
        </div>
        <div class="ball">          
        </div>
    </div>
    <div id="log-panel">
        <div class="eye-r">
            <div class="ball-r">       
            </div>
        </div>
        <div id="regi">
            <h2 id="reg-inf">Sign Up</h2>
            <form action="" method="POST" id="reg-form">
                <input type="text" name="login" placeholder="Login"/><br />
                <input type="email" name="email" placeholder="Email"/><br />
                <input type="password" name="password" placeholder="Password"/><br />
                <input type="submit" name="reg-sub" value="Sign Up" id="reg-sub"v/>
                <p>Back to <a href="login.php">login</a></p>
            </form>
            <?php
                $register = new \Classes\Controller\UsersContr();
                if(isset($_POST['reg-sub']))
                {
                    $login = $_POST['login'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $register->createUser($login,$email,$password);
                }
            ?>
        </div>      
    </div>  
</body>
</html>