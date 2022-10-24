<?php
    //DATABASE CONNECTION PARAMETERS 
    define("DB_SERVER","localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_NAME","sunnyspot");

    // Establish connection to MySQL database

    try{
        $pdo = new PDO("mysql: host=" .DB_SERVER. ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        die("ERROR: Failed to establish connection. ". $error->getMessage());
    }
?>
