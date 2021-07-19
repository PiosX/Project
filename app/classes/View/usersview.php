<?php
    namespace Classes\View;

    class UsersView extends \Classes\Model\Users
    {
        public function showAllUsers()
        {
            $result = $this->getAllUsers();
        }
    }
?>