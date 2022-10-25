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
            //Prepare and execute query users
            $sql_users = "SELECT * FROM users WHERE username = ?";
            $statement = $pdo->prepare($sql_users);
            $statement->bindParam(1, $username);
            //Check for username
            try{
                $statement->execute();
                $result =$statement->fetch();
                //Check for password
                if( $password == $result['pword']){
                    $sql_logins = "INSERT INTO logins (username,login_date) VALUES (?, ?)";
                    $stmt = $pdo->prepare($sql_logins);
                    $stmt->bindParam(1, $username);
                    date_default_timezone_set('Australia/Sydney');
                    $date = date('m/d/Y h:i:s a', time());
                    $stmt->bindParam(2, $date);
                    try{
                        $stmt->execute();
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        header('location:dashboard.php');
                    }catch(PDOException $eror){
                        $message = $eror;
                    }

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
