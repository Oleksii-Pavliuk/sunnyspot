
<?php
    $id = $_GET['q'];
    $date = $_GET['date'];
    $myfile = fopen("bookings.txt", "a") or die("Unable to open file!");
    $txt = $id .'---------'. $date;
    fwrite($myfile, $txt);
    fclose($myfile);
    echo "Booking successeful"
?>
