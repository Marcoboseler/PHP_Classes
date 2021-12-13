<?php

require_once('classes.php');

class loginController{

    function Login($username, $password){

        $sessionController = new sessionController();
        $sessionController->startSession();
        $baseController = new baseController();
        $db = $baseController->getConnection();

        try{
            $loginQuery = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $statement = $db->prepare($loginQuery);
            $statement->execute();
            $user = $statement->fetchALL(PDO::FETCH_OBJ);

            if($user != null){

                $_SESSION['isLoggedIn'] = "True";
                header('Location: xweb.php');

            }else{

                echo "<br><br> Wrong credentials, please try again.";
            }
        }catch(Exception $e){

            echo 'Message: ' . $e->getMessage();
        }
    }
    
}