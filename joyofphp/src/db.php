<?php
try {
    $host = $_SERVER['HTTP_HOST'];
    if (str_contains($host,'infinityfree'))
        $mysqli = new mysqli('sql111.infinityfree.com', 'if0_38310603', 'uBHu8fW6r5', 'if0_38310603_cars' );
    elseif (str_contains($host,'localhost')) {
        $mysqli = new mysqli('localhost','root','');
        $mysqli->select_db('Cars');
    }
    if (mysqli_connect_errno())
        die("Connect failed: %s\n".mysqli_connect_error());
    //echo 'Connected successfully to mySQL.<br>'; 
} catch (Throwable $e) {
    echo $e;
}
?>