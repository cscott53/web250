<?php
/**
 * Joy of PHP sample code
 * Demonstrates how to create a database, create a table, and insert records.
 */

include 'db.php';

$query = " CREATE TABLE IMAGES (ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT, VIN varchar(17), ImageFile varchar(250))";
//echo "<p>***********</p>";
//echo $query ;
//echo "<p>***********</p>";
if ($mysqli->query($query) === TRUE) 
{
    echo "Database table 'Images' created</P>";
}
else
{
    echo "<p>Error: " . mysqli_error($mysqli);
}
 echo "<br><br><a href='index.html'>Home</a>";
$mysqli->close();
?>