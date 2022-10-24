<!-- 


            Function ro delete cabin from list of cabins 



 -->




<?php
    require_once("config/config.php");
    $id = $_GET['q'];
    $sql_delete= 'DELETE FROM cabins WHERE (cabin_id = ?)';

    if($stmt = $pdo->prepare($sql_delete)){
        $stmt->bindParam(1, $id);
        //Exeecute the querry against opened connection
        try{
            $stmt -> execute();
            echo ('Cabin deleted');
        }catch(PDOException $eror){
            echo $eror;
        }
    }
?>