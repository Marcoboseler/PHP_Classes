<?php

require_once('classes.php');

class baseController{

    function getConnection(){
        
        $connection = new DatabaseConnection();
        return $db = $connection->connect();
    }

}