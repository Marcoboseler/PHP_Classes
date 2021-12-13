<?php

require_once('classes.php');

class sessionController{

    function startSession(){
        
        if(!isset($_SESSION)){
            
            session_start();
        }
    }

    function destroySession(){

        session_destroy();
    }

    function checkSession(){

        if($_SESSION['isLoggedIn'] == "True"){
            
            echo "Welcome!";
        }else {

            header('Location: login.php');
        }
    }

}