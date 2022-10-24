
<?php
if(!isset($_SESSION['username'])){
    header('index.php');
}

include 'inc/header.php';?>

<!-- 
#
    Dashboard page
#
#
 -->
    <div class="container-fluid bg-info text-center">
        <div class="p-5">Welcome to dashboard <?php echo $_SESSION['username']; ?></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Homepage</a></li>
            <li class="nav-item"><a class=" nav-link" href="inc/logout.php">Logout</a></li>
            <li class="nav-item"><a class=" nav-link" href="inc/bookings.php">Bookings</a></li>
        </ul>
    </nav>
    <?php
        echo "<div class=' cabins container-fluid'>";
        $sql_all_cabins = 'SELECT * FROM cabins';
        if($result = $pdo->query($sql_all_cabins))
        {
            if($result->rowCount() > 0){
                while($row = $result->fetch()){
                    echo "
                    <div id='cabin-$row[cabin_id]' class='card m-2' id style='width: 20rem;'>
                        <img src='inc/cabins/cabin$row[cabin_id].jpg' class='card-img-top' alt='Cabin image'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[cabin_name] </h5>
                            <p class='card-text'>$row[cabin_description]</p>
                        </div>
                        <ul class='list-group list-group-flush'>
                            <li class='list-group-item'>Night price: $row[price_night]</li>
                            <li class='list-group-item'>Week price: $row[price_week]</li>
                        </ul>
                        <div class='card-body text-center'>
                            <button id='editBtn' onclick='editModal($row[cabin_id])' class ='w-50 btn mt-2 btn-primary'> Edit </button>
                            <button class ='btn w-25 mt-2 btn-secondary' onclick='deleteCabin($row[cabin_id])'><i class='fa fa-trash-o fa-3' aria-hidden='true'></i></button>
                        </div>
                    </div>";
                }
            }
        }
            echo "<div onclick='addModal()' class='cabin add-cabin text-center mt-2 p-5'>";
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>';
            echo "</div>";
        echo "</div>";
    ?>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa fa-info-circle fa-2 me-2" aria-hidden="true"></i>
                <strong class="me-auto">SunnySpot</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body"></div>
        </div>
    </div>

<script>
                //Toast function
                function toast(content){
                    const toastLive = document.getElementById('liveToast')
                    const toast = new bootstrap.Toast(toastLive)
                    document.querySelector('.toast-body').innerHTML = content
                    toast.show()
                }
</script>

<?php
//Include footer and modals
include 'inc/cabin_form.php';
include 'inc/footer.php';
?>

