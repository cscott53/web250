 <?php
    $mysqli = new mysqli('localhost', 'root', '', 'Cars' );
    if (mysqli_connect_errno())
        die("Connect failed: %s\n".mysqli_connect_error());
    //else echo 'Connected to mySQL<br>';
?>