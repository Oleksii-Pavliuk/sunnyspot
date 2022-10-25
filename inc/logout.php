<?php
// 
// 
#       Logout function
#
#
#
require_once('../config/config.php');
session_start();
$sql_logins =  "UPDATE logins SET logout_date = :date  WHERE login_date = (SELECT MAX(login_date) FROM logins WHERE username = :un) AND username = :un";
$statement = $pdo->prepare($sql_logins);
date_default_timezone_set('Australia/Sydney');
$date = date('m/d/Y h:i:s a', time());
$statement->bindParam(':date', $date);
$statement->bindParam(':un', $_SESSION['username']);
try{
    $statement->execute();
}catch(PDOException $eror){
    echo  $eror;
}
session_destroy();
header('location: ../index.php')
?>