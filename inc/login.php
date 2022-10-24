<?php
    #
    //Login function
    #
    #
    #
    if(isset($_POST['btnLogin'])){
        //Get variables from form
        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));

        //If username and password exists prepare query
        if($username != '' && $password != ''){
            //Prepare and execute query query
            $sql = "SELECT * FROM users WHERE username = ?";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(1, $username);
            //Check for username
            try{
                $statement->execute();
                $result =$statement->fetch();
                //Check for password
                if( $password == $result['pword']){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    header("location:dashboard.php");
                }else{
                    $message = "<label>Wrong password</label>";
                }
            }catch(PDOException $eror){
                $message = "<label>$eror</label>";
            }
        }else{
            $message = "<label>Please provide an email and password</label>";
        }
    }
?>
