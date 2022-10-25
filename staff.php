<?php
include 'inc/header.php';

if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>

<div class="container-fluid bg-info text-center">
        <div class="p-5">Welcome to dashboard <?php echo $_SESSION['username']; ?></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Homepage</a></li>
            <li class="nav-item"><a class=" nav-link" href="inc/logout.php">Logout</a></li>
            <li class="nav-item"><a class=" nav-link" href="staff.php">Staff operations</a></li>
        </ul>
    </nav>

    <table class="table table-striped">
        <thead>
            <th>Photo</th>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Adress</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Loged in</th>
            <th>Loged out</th>
        </thead>
        <tbody>
            <?php
            // SQL query for logins table
            $sql_all_logins = 'SELECT MAX(login_date) AS login, MAX(logout_date) AS logout,username FROM logins GROUP BY username';
            if($result = $pdo->query($sql_all_logins))
            {
                if($result->rowCount() > 0){
                    while($row = $result->fetch()){
                        // SQL query for each user in logins table
                        $sql_user = "SELECT * FROM users WHERE username = :un";
                        if($stmt = $pdo->prepare($sql_user)){
                            $stmt->bindParam(':un',$row['username']);
                            if($stmt -> execute()){
                                //Fetch all columns in table
                                $user = $stmt->fetch();
                                echo "
                                    <tr>
                                        <td><img class='staff-pic' src='inc/staff_pics/$user[photo]'></td>
                                        <td>$user[username]</td>
                                        <td>$user[first_name]</td>
                                        <td>$user[last_name]</td>
                                        <td>$user[adress]</td>
                                        <td>$user[phone]</td>
                                        <td>$user[mobile]</td>
                                        <td>$row[login]</td>
                                        <td>$row[logout]</td>
                                    </tr>";
                            }else{
                                echo 'eror ';
                            }
                        }else{
                            echo 'eror users';
                        }
                    }
                }else{
                    echo 'No enteries';
                }
            }else{
                echo 'eror logins';
            }
            ?>
        </tbody>
    </table>

    
<?php
//Include footer and modals
include 'inc/footer.php';
?>

