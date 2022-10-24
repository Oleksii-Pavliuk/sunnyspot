<?php
// 
// 
#       Logout function
#
#
#
session_start();
session_destroy();
header("location:../index.php");
?>