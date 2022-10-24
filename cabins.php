<?php 
    // Include header
    include 'inc/header.php';
?>

    <div class="text-bg-white">
        
        <div class="cabins cover-container d-flex w-100 h-100 p-3 mx-auto flex-column rounded">
            <header class="mb-auto">
                <div>
                <h3 class="float-md-start mb-0">Sunny Spot</h3>
                <nav id="nav-cabins" class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link fw-bold py-1 px-0 active" href="cabins.php">Cabins</a>
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
        </div>
        <main>
            <?php
                $sql_all_users = 'SELECT * FROM cabins';
                if($result = $pdo->query($sql_all_users))
                {
                    if($result->rowCount() > 0){
                        while($row = $result->fetch()){
                        echo 
                            "<div class='divider'></div>
                            <div class='container-fluid shadow-lg col-xxl-8 px-4 py-5'>
                                <div class='row flex-lg-row-reverse align-items-center g-5 py-5'>
                                    <div class='col-10 col-sm-8 col-lg-6'>
                                        <img src='img/cabins/cabin-.png' class='d-block mx-lg-auto img-fluid' alt='Cabin picture' width='700' height='500' loading='lazy'>
                                    </div>
                                    <div class='col-lg-6'>
                                        <form>
                                            <h1 class='display-5 fw-bold lh-1 mb-3'>$row[cabin_name]</h1>
                                            <p class='lead ms-2'>$row[cabin_description]</p>
                                            <span class ='ms-2'>Price for night: $row[price_night]$ / </span>
                                            <span class ='ms-2'> Price for week: $row[price_week]$</span>
                                            <div class='d-grid gap-2 d-md-flex justify-content-md-start'>
                                            <label class='ms-2' for='date'>Chose your dates:</label>
                                            <input type='text' name='datefilter' value='' />
                                            </div>
                                            <input type='button' class=' m-2 w-100 btn btn-outline-primary btn-lg px-4 type='submit' value='Chose dates'
                                        </form>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                }
            ?>
        </main>

        <footer class="mt-auto text-center mt-5 text-black-50">
            <p>Copyright SunnySpot 2022</p>
        </footer>

    </div>


<?php
//Include footer
include 'inc/footer.php';
?>

