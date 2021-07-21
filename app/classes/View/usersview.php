<?php
    namespace Classes\View;

    class UsersView extends \Classes\Model\Users
    {
        public function showAllUsers()
        {
            $result = $this->getAllUsers();
        }
        public function showUserName()
        {
            $result = $this->getUserName();
        }
        public function countUsers()
        {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
        }
        public function showChatUser()
        {
            $result = $this->getChatUser();
        }
        public function checkUserName()
        {
            $result = $this->checkUser();
        }
    }
?>