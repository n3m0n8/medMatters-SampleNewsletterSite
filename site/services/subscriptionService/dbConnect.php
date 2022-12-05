<?php 
// Include config file 
    require_once __DIR__.'***********/config.php'; 
        try {  
            $dbObject = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';port='.DB_PORT.'charset=utf8;', DB_USERNAME, DB_PASSWORD);
            $dbObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exc){
            die('Sorry there was a problem connecting to the database. The problem report follows: '.$exc);
        }
?>