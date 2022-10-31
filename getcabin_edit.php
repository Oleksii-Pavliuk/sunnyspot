<?php
// 
// Function that retrieves information about cabin from database 
//
# 
    require_once("config/config.php");
    $id = intval($_GET['q']);
    $sql_cabin = "SELECT * FROM cabins WHERE cabin_id = :id";
    //Prepare the querry
    if($stmt = $pdo->prepare($sql_cabin)){
        $stmt->bindParam(':id', $id);
        //Exeecute the querry against opened connection
        if($stmt -> execute()){
            //Make sure only one record returned
            if($stmt->rowCount() == 1){
                //Fetch all columns in specified variable
                $cabin = $stmt->fetch();
                echo $cabin['cabin_name'].'||';
                echo $cabin['cabin_description'].'||';
                echo $cabin['cabin_features'].'||';
                echo $cabin['price_night'].'||';
                echo $cabin['price_week'].'||';
            }else{
                echo ('error 3');
            }
        }else{
            echo('error 2');
        }
    }else{
        echo('error 1');
    }
?>