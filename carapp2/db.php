 <?php
    $mysqli = new mysqli('sql111.infinityfree.com', 'if0_38310603', 'uBHu8fW6r5', 'if0_38310603_cars' );
    if (mysqli_connect_errno())
        die("Connect failed: %s\n".mysqli_connect_error());
    //else echo 'Connected to mySQL<br>';
?>