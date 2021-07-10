<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="javascript/log_panel.js"></script>
</head>
<body>
        <div id="shadow-log">
            
            <div id="log-panel">
                <div id="ani-reg">
                </div>
                <div id="close-but">
                    <p onclick="closeDiv()">x</p>
                </div>
                <div id="log">
                    <h2>Welcome</h2>
                    <form action="" method="POST" id="login-form">
                        <input type="email" name="email" placeholder="Email"/><br />
                        <input type="password" name="password" placeholder="Password"/><br />
                        <input type="submit" name="log-sub" value="Sign In" id="log-sub"/>
                        <p id="reg">Don't have an account? <a href="#" onclick="switchReg()">Sign Up</a></p>
                    </form>   
                </div>
                <div id="regi">
                    <form action="" method="POST" id="reg-form">
                        <input type="text" name="login" placeholder="Login"/><br />
                        <input type="email" name="email" placeholder="Email"/><br />
                        <input type="password" name="password" placeholder="Password"/><br />
                        <input type="submit" name="reg-sub" value="Sign Up" id="reg-sub"/>
                    </form>  
                </div>      
            </div>  
        </div>
        <div class="top-container">
            <a href="">Home</a>
            <a href="">Informations</a>
            <a href="">Chat</a>
            <a href="">Forum</a>
            <button id="homeLog" onclick="showDiv()">Sign In</button>     
        </div>
        <div class="mid-container">
            
        </div>
        <div class="bot-container">

        </div>
</body>
</html>