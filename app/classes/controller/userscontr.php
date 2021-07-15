<?php
namespace Classes\Controller;

    class UsersContr extends \Classes\Model\Users
    {
        public function createUser($login,$email,$password)
        {
            $this->setUser($login,$email,$password);
        }

        public function loginUser($email, $password)
        {
            $this->getUser($email,$password);
        }
    }