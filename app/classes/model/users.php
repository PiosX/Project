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
                    $sql = "SELECT * FROM users WHERE login = :login OR email = :email";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->bindParam(":login",$login);
                    $stmt->bindParam(":email",$email);
                    $stmt->execute();
                    $stmt->closeCursor();
                    if($stmt->rowCount()==0)
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
                        $errorR[] = "Login or Email already registered.";
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

        protected function getUser($email,$password)
        {
            if(isset($email) && isset($password) && !empty($email) && !empty($password))
            {
                $email = trim($email);
                $password = trim($password);

                if(filter_var($email, FILTER_SANITIZE_EMAIL) && filter_var($password, FILTER_SANITIZE_STRING))
                {
                    $sql = "SELECT * FROM users WHERE email = :email";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->bindParam(":email", $email);
                    $stmt->execute();

                    if($stmt->rowCount()>0)
                    {
                        $row = $stmt->fetch();
                        if(password_verify($password, $row['password']))
                        {
                            unset($row['password']);
                            $this->createUserSession($email);
                            if(isset($_SESSION['email']))
                            {
                                header("Location:content/profile.php");
                            }
                        }
                        else
                        {
                            $errorL[] = "Invalid Email or Password.";
                        }
                    }
                    else
                    {
                        $errorL[] = "Invalid Email or Password.";
                    }
                }
            }
            else
            {
                if(!isset($email) || empty($email))
                {
                    $errorL[] = "Email is required.";
                }
                else if(!isset($password) || empty($password))
                {
                    $errorL[] = "Password is required.";
                }
            }
            if(isset($errorL) && count($errorL) > 0)
            {
                foreach($errorL as $error_msg)
                {
                    echo "<div class='alert-error'>$error_msg</div>";
                }         
            }
        }

        public function createUserSession($email)
        {
            session_start();
            $_SESSION['email'] = $email;

            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":email", $_SESSION['email']);
            $stmt->execute();
            $row = $stmt->fetch();
            $_SESSION['login'] = $row['login'];
            $_SESSION['time'] = time() + (10*60);
        }

        public function logout($location)
        {
            session_destroy();
            unset($_SESSION['email']);
            unset($_SESSION['login']);
            header("Location:$location");
        }

        protected function getAllUsers()
        {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            if($stmt->rowCount()>0)
            {
                while($row = $stmt->fetch())
                {
                    if($row['login'] == $_SESSION['login'])
                    {
                        echo "<li><a href='' id='me'>".$row['login']."</a></li>";
                    }else
                    {
                        echo "<li><a href=''>".$row['login']."</a></li>";
                    }
                    
                }
            }
        }
    }