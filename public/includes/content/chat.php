<?php
session_start();
require ('../../../vendor/autoload.php'); 
    $users = new \Classes\View\UsersView();
    $mess = new \Classes\Controller\UsersContr();
    $logout = new \Classes\Model\Users();
    @$log = $_GET['profile'];
    @$log2 = $_GET['user']; 

    if(isset($_GET['action']) && $_GET['action'] == 'logout')
    {     
        $logout->logout('../../index.php?action=logout');
    }
$logout->deleteSessionAFK();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../../css/chat.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Expanded&display=swap" rel="stylesheet">
    <script src="../../javascript/log_panel.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var auto_refresh = setInterval(function(){
            $('#mess-cont').load('other_includes/chatRefresh.php?user=<?php echo $log2 ?>'); return false;
        }, 1000);
    </script>
</head>
<body>
    <div class="top-container">
        <a href="">Informations</a>
        <a href="chat.php" id="actual">Chat</a>
        <a href="">Forum</a>
        <a href="profile.php?profile=<?php echo $_SESSION['login'] ?>">Profile</a>
        <div id="avatar">
            <?php
                $users->showTinyAvatar("../../images/");
            ?>
        </div>
        <button id="homeLog" onclick="location.href='?action=logout'">Logout</button>     
    </div>
    <div class="mid-container">
        <div id="users-cont">
            <div id="users-top">
                <p>Watchers(<?php echo $users->countWatchers(); ?>): </p>
            </div>
            <div id="users-online">
                <p>Online()</p>
            </div>
                <ul>
                    <?php
                        $users->showYourWatchers();
                    ?>
                </ul>
            <div id="users-offline">
                <p>Offline()</p>
            </div>
                <ul>
                    <?php
                        $users->showYourWatchers();
                    ?>
                </ul>
        </div>
        <?php if(isset($_GET['user'])){ ?>
        <div id="chat-cont">
            <div id="send-to">
                <p>Chat with: <span><?php echo $users->showChatUser(); ?></span></p>
            </div>
            <div id="mess-cont">
                <?php $users->showMessages(); ?>
            </div>
            <div id="mess-send">
                <form action="" method="POST" enctype="multipart/form-data">
                    <textarea name="message" cols="52" rows="5" wrap="hard"></textarea>
                    <input type="submit" name="message-sub" id="message-sub" value="Send">
                </form>
                <?php 
                    @$message = $_POST['message'];
                    $mess->sendMessage($message);
                ?>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>
<script> 
    var myDiv = document.getElementById("mess-cont");
    myDiv.scrollTop = myDiv.scrollHeight+100;
</script>