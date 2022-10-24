<?php
#
// Register function
#
#
#
//Database insertion
    if(isset($_POST['btnReg']))
    {
       //variables parsed from POST request
       $username = trim($_POST['username']);
       $password = trim(md5($_POST['password']));

        //If username and password inputted execute sql query
       if($username !="" && $password !=""){
        //create sql querry
            $sql = "INSERT INTO users (username, pWord) VALUES(?, ?) ";       
            //
            $statement = $pdo->prepare($sql);
            $statement->bindParam(1, $username);
            $statement->bindParam(2, $password);
            try{
                $statement->execute();
                $count = $statement->rowCount(); 
                
                    if($count > 0){
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        header("location:dashboard.php");
                    }else{
                        $message = '<label>Failed to Register user</label>';
                    } 
                }catch(PDOException){
                    $message = '<label>Username already exists</label>';
            }
            }else{
                $message = "<label>Please provide an email and password</label>";
            }
         
        }
?>
