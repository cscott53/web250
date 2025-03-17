<html>
<head>
<title>Sam's Used Cars</title>
</head>

<body>

<h1>Sam's Used Cars</h1>
<a href="ViewCarsWithStyle2.php">&larr;Back</a><br>
<a href="samsusedcars.html">Sam's used cars home</a><br>
<br>
<?php 
include 'db.php';
$vin = $_GET['VIN'];
$query = "DELETE FROM INVENTORY WHERE VIN='$vin'";
echo "$query <BR>";
/* Try to query the database */
if ($result = $mysqli->query($query)) {
   Echo "The vehicle with VIN $vin has been deleted.";
}
else
{
    echo "Sorry, a vehicle with VIN of $vin cannot be found " . mysql_error()."<br>";
}

$mysqli->close();
   
?>

</body>

</html>
