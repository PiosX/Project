<?php
namespace Classes\Model;

use PDOException;

class Users extends \Classes\Config\Dbh
    {
        protected function setUser($login,$email,$password)
        {
            if(isset($login) && isset($email) && isset($password) && !empty($login) && !empty($email) && !empty($password))
            {
                $login = trim($login);
                $email = trim($email);
                $password = trim($password);
                $cost = array("cost"=>12);
                $hashPwd = password_hash($password, PASSWORD_BCRYPT, $cost);
                if(filter_var($login, FILTER_SANITIZE_STRING) && filter_var($email, FILTER_SANITIZE_EMAIL))
                {
                    try
                    {
                        $sql = "INSERT INTO users(login,email,password) VALUES(?,?,?)";
                        $stmt = $this->connect()->prepare($sql);
                        $stmt->execute([$login,$email,$hashPwd]);
                        $succes = "User has been created!";
                    }catch(\PDOException $e)
                    {
                        echo "Error: ".$e->getMessage();
                    }
                }
                else
                {
                    $errorR[] = "Invalid login or email.";
                }            
            }
            else
            {
                if(!isset($login) || empty($login))
                {
                    $errorR[] = "Login is required.";
                }
                else if(!isset($email) || empty($email))
                {
                    $error[] = "Email is required.";
                }
                else if(!isset($password) || empty($password))
                {
                    $errorR[] = "Password is required.";
                }
            }
            if(isset($errorR) && count($errorR) > 0)
            {
                foreach($errorR as $error_msg)
                {
                    echo "<div class='alert-error'>$error_msg</div>";
                }         
            }
            if(isset($succes))
            {
                echo "<div class='alert-success'>$succes</div>";
            }
        }
    }