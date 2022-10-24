<?php 
    // Include header
    include 'inc/header.php';
    $message = ''
?>


<div class="contacts text-center text-bg-dark">
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
        <h3 class="float-md-start mb-0">Sunny Spot</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="index.php">Home</a>
            <a class="nav-link fw-bold py-1 px-0" href="cabins.php">Cabins</a>
            <a class="nav-link fw-bold py-1 px-0 active" href="contacts.php">Contact</a>
            <?php
            if(isset($_SESSION['username'])){
                echo("<a href='dashboard.php' class='nav-link fw-bold py-1 px-0'>Dashboard</a>");
            }else{
                echo("
                        <button type='button' data-bs-toggle='modal' data-bs-target='#regModal' class='ms-2 btn btn-info'>Register</a>
                        <button type='button' data-bs-toggle='modal' data-bs-target='#logModal' class='ms-2 btn btn-warning'>Login</button>
                    ");
                }
            ?>
        </nav>
        </div>
    </header>

    <main class="px-3">

    <div class="container text-start col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <div id="map" style="width:100%;height:400px"></div>
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Sunny Spot</h1>
                <p class="lead">Coast Track, Royal Nat'l Park NSW 2233</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href='mailto:test@sunnyspot.com'><button type="button" class="btn btn-primary btn-lg px-4 me-md-2" href='mailto:test@sunnyspot.com'>Email</button></a>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">0441234567</button>
                </div>
            </div>
        </div>
    </div>

    </main>

    <footer class="mt-auto text-white-50">
        <p>Copyright SunnySpot 2022</p>
    </footer>
    </div>

</div>



<?php
//Include footer
include 'inc/modals.php';
include 'inc/footer.php';
?>
