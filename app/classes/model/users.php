<?php
namespace Classes\Model;

    class Users extends \Classes\Config\Dbh
    {
        protected function setUser($login,$email,$password)
        {
            $sql = "INSERT INTO users(login,email,password) VALUES(?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$login,$email,$password]);
        }
    }