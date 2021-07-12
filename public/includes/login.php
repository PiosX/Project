<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script src="javascript/log_panel.js"></script>
</head>
<body> 
    <div id="log-panel">
        <div id="log">
            <h2 id="log-inf">Welcome</h2>
            <form action="" method="POST" id="login-form">
                <input type="email" name="email" placeholder="Email"/><br />
                <input type="password" name="password" placeholder="Password"/><br />
                <input type="submit" name="log-sub" value="Sign In" id="log-sub"/>
                <p id="reg">Don't have an account? <a href="register.php">Sign Up</a></p>
            </form>   
        </div>
    </div>  
</body>
</html>