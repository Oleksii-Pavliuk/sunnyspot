<!-- 
#
    Modal apears from dashboard when edit or add buttons clicked
#
#
 -->
<?php
    //Edit cabin function
    if(isset($_POST['editSubmit'])){

        $id = $_POST['cabin_id'];
        $name= $_POST['cabin_name'];
        $description = $_POST['cabin_description'];
        $price_night = $_POST['price_night'];
        $price_week = $_POST['price_week'];
        $availability = $_POST['datefilter'];


        // File upload 
        $image_file = $_FILES["cabin_img"];

        if (!isset($image_file)) {
            die('No file uploaded.');
        }
               
        // Move the temp image file to the images/ directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location, is the location of the current PHP file
            __DIR__ ."/cabins/cabin". $id .".jpg"
        );


        $sql_edit = "UPDATE cabins SET cabin_name = ?, cabin_description = ?, price_night = ?,price_week = ?,cabin_availability = ? WHERE (cabin_id = ?)";

        if($stmt = $pdo->prepare($sql_edit)){
            $stmt->bindParam(6, $id);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $price_night);
            $stmt->bindParam(4, $price_week);
            $stmt->bindParam(5, $availability);
            //Exeecute the querry against opened connection
            try{
                $stmt -> execute();
                echo "<script>toast('Content edited')</script>";
            }catch(PDOException $eror){
                echo $eror;
            }
            }
        }



    //Add cabin function
    if(isset($_POST['addSubmit'])){
        $id = $_POST['cabin_id'];
        $name= $_POST['cabin_name'];
        $description = $_POST['cabin_description'];
        $price_night = $_POST['price_night'];
        $price_week = $_POST['price_week'];

        $sql_add = "INSERT INTO cabins (cabin_name, cabin_description, price_night, price_week) VALUES (?, ?, ?, ?)";

        if($stmt = $pdo->prepare($sql_add)){
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $price_night);
            $stmt->bindParam(4, $price_week);
            //Exeecute the querry against opened connection
            try{
                $stmt -> execute();
                echo "<script>toast('Cabin added')</script>";
            }catch(PDOException $eror){
                echo $eror;
            }
        }
    }
?>

<div id="myModal" class="modal-dashboard">

<!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="container-fluid">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <input id='cabin_id' type='hidden' name='cabin_id' value=''>
                <?php
                    echo ("
                    <label for='cabin_img'>Cabin photo:</label>
                    <input type='file' id='cabin_img' name='cabin_img' accept='image/jpg'>
                    <br>
                    <br>
                    <label for='cabin_name'>Cabin name:</label>
                    <br>
                    <input type='text' name='cabin_name' id='cabin_name' value=''>
                    <br>
                    <br>
                    <label for='cabin_description'>Cabin description:</label>
                    <br>
                    <textarea name='cabin_description' id='cabin_description' cols='30' rows='10' value=''></textarea>
                    <br>
                    <br>
                    <label for='price_night'>Price night:</label>
                    <br>
                    <input type='number' id='price_night' name='price_night' value=''>
                    <br>
                    <br>
                    <label for='price_week'>Price week:</label>
                    <br>
                    <input type='number' id='price_week' name='price_week' value=''>
                    <br>    
                    <br>
                    <label class='ms-2' for='date'>Availability:</label>
                    <br>
                    <input type='text' name='datefilter'/>
                    <br>
                    <input type='submit' id='form_button' class='btn btn-primary mt-3' value='Submit' name=''>"
                );
                ?>
            </form>
        </div>
    </div>
</div>