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
<!-- Header -->
<div class="container-fluid bg-info p-5 fs-1 text-center">
    Welcome to SunnySpot
</div>
<!-- Navbar -->
<nav class="text-bg-dark">
        <div class="container">
          <div class="fs-3 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            </ul>
            <!-- Dynamic buttons depending on session -->
            <?php
                if(isset($_SESSION['username'])){
                    echo("<a href='dashboard.php'>
                    <button type='button' class='fs-4 m-2 btn btn-warning'>To Personal Cabinet</button>
                    </a>");
                }else{
                    echo("
                        <button type='button' data-bs-toggle='modal' data-bs-target='#regModal' class='fs-4 m-2 btn btn-info'>Register</button>
                        <button type='button' data-bs-toggle='modal' data-bs-target='#logModal' class='fs-4 m-2 btn btn-warning'>Login</button>
                    ");
                }
                ?>
            </div>
          </div>
</nav>

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