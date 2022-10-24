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




<!-- Include footer -->
<?php
    include 'inc/modals.php';
    include 'inc/footer.php';?>