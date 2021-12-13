<?php
require_once('classes.php');

class DatabaseConnection{

    public function connect(){

        $dbhost = "localhost";
        $dbname = "schoolphpdb";
        $user = "root";
        $password = "";

        $db = new PDO("mysql:host=$dbhost;dbname=$dbname","$user","$password") or die("Connection failed");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}