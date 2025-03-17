 <?php
$mysqli = new mysqli('localhost', 'root', '', 'Cars' );
/* check connection */
if (mysqli_connect_errno()) {
    die("Connect failed: %s\n".mysqli_connect_error());
} 
?>