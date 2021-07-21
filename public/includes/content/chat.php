<?php
session_start();
require ('../../../vendor/autoload.php'); 
    $users = new \Classes\View\UsersView();
    @$log = $_GET['profile'];

    if(isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        $logout = new \Classes\Model\Users();
        $logout->logout('../../index.php?action=logout');
    }
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
</head>
<body>
    <div class="top-container">
        <a href="">Informations</a>
        <a href="chat.php" id="actual">Chat</a>
        <a href="">Forum</a>
        <a href="profile.php?profile=<?php echo $_SESSION['login'] ?>">Profile</a>
        <button id="homeLog" onclick="location.href='?action=logout'">Logout</button>     
    </div>
    <div class="mid-container">
        <div id="users-cont">
            <div id="users-top">
                <p>Users(<?php echo $users->countUsers(); ?>): </p>
            </div>
            <ul>
                <?php
                    $users->showAllUsers();
                ?>
                <ul id="opList"">
                    <li><a href="">Opt1</a></li>
                    <li><a href="">Opt2</a></li>
                </ul>
            </ul>
        </div>
        <?php if(isset($_GET['user'])){ ?>
        <div id="chat-cont">
            <div id="send-to">
                <p>Chat with: <span><?php echo $users->showChatUser(); ?></span></p>
            </div>
            <div id="mess-cont">

            </div>
            <div id="mess-send">
                <form action="" method="POST" enctype="multipart/form-data">
                    <textarea name="message" cols="60" rows="5" wrap="hard"></textarea>
                    <input type="submit" name="message-sub" id="message-sub" value="Send">
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>