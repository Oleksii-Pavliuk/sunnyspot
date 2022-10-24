<?php 
    // Include header
    include 'inc/header.php';
    $message = '';

?>
<?php 
    //Include login and register php
    include 'inc/register.php';
    include 'inc/login.php';
?>

<div class="d-flex text-center text-bg-dark">
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
        <h3 class="float-md-start mb-0">Sunny Spot</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link fw-bold py-1 px-0" href="cabins.php">Cabins</a>
            <a class="nav-link fw-bold py-1 px-0" href="contacts.php">Contact</a>
            <?php
            if(isset($_SESSION['username'])){
                echo("<a href='dashboard.php' class='nav-link fw-bold py-1 px-0'>Dashboard</a>");
            }else{
                echo("
                        <button type='button' data-bs-toggle='modal' data-bs-target='#regModal' class='ms-3 btn btn-info'>Register</a>
                        <button type='button' data-bs-toggle='modal' data-bs-target='#logModal' class='ms-2 btn btn-warning'>Login</button>
                    ");
                }
            ?>
        </nav>
        </div>
    </header>

    <main class="px-3">
        <h1>Cover your trip.</h1>
        <p class="lead">We have big range of cabins for you and your friends and family, have a look at them and pick one that suits more for you </p>
        <p class="lead">
        <a href="cabins.php" class="btn btn-lg btn-secondary text-dark fw-bold border-white bg-white">Cabins</a>
        </p>
    </main>

    <footer class="mt-auto text-white-50">
        <p>Copyright SunnySpot 2022</p>
    </footer>
    </div>

</div>



    <!-- Register modal -->
    <div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  border-bottom-0">
            <h1 class="modal-title fs-5" id="regModalLabel">Register</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $message; ?> 
                <br>
                <!-- Registration form  -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-floating mb-3">
                            <input ttype="text" name="username" id="usernameId" class="form-control rounded-3"  placeholder="Username">
                            <label for="usernameId">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" id="passwordId" class="form-control rounded-3" placeholder="Password">
                            <label for="passwordId">Password</label>
                        </div>
                    <input type="submit" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" value="Login" name="btnReg">
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Login modal -->
    <div class="modal fade" id="logModal" tabindex="-1" aria-labelledby="logModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
            <h1 class="modal-title fs-5" id="logModalLabel">Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $message; ?> 
                <br>
                <!-- Login form -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-floating mb-3">
                            <input ttype="text" name="username" id="usernameId" class="form-control rounded-3"  placeholder="Username">
                            <label for="usernameId">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" id="passwordId" class="form-control rounded-3" placeholder="Password">
                            <label for="passwordId">Password</label>
                        </div>
                    <input type="submit" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" value="Login" name="btnLogin">
                </form>
            </div>
        </div>
        </div>
    </div>

<!-- Include footer -->
<?php include 'inc/footer.php';?>