<?php
/**
 * Joy of PHP sample code
 * Demonstrates how to create a database, create a table, and insert records.
 */

include 'db.php';
try {
    $query = " create table inventory 
    ( VIN varchar(17) PRIMARY KEY, YEAR INT, Make varchar(50), Model varchar(100), 
    TRIM varchar(50), EXT_COLOR varchar (50), INT_COLOR varchar (50), ASKING_PRICE DECIMAL (10,2), 
    SALE_PRICE DECIMAL (10,2), PURCHASE_PRICE DECIMAL (10,2), MILEAGE int, TRANSMISSION varchar (50), 
    PURCHASE_DATE DATE, SALE_DATE DATE)";
    //echo "<p>***********</p>";
    //echo $query ;
    //echo "<p>***********</p>";
    $tableQuery=$mysqli->query("show tables like 'inventory'");
    if ($tableQuery->num_rows>0) echo "<p>Table 'inventory' exists</p>";
    elseif ($mysqli->query($query)) 
        echo "<p>Table 'inventory' created</p>";
    else
        echo "<p>Error: </p>" . mysql_error();
    // Dates are stored in MySQL as 'YYYY-MM-DD' format
    $query = "insert ignore into `inventory` 
    (`VIN`, `YEAR`, `Make`, `Model`, `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`, `SALE_PRICE`, `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`, `SALE_DATE`) 
    VALUES 
    ('5FNYF4H91CB054036', '2012', 'Honda', 'Pilot', 'Touring', 'White Diamond Pearl', 'Leather', '37807', NULL, '34250', '7076', 'Automatic', '2012-11-08', NULL);";


    if ($mysqli->query($query)) {
        echo "<p>Honda Pilot inserted into inventory table. </p>";
    }
    else
    {
        echo "<p>Error inserting Honda Pilot: </p>" . mysql_error();
        echo "<p>***********</p>";
        echo $query ;
        echo "<p>***********</p>";
    }

    // Insert a Dodge Durango

    $query = "insert ignore into `inventory` (`VIN`, `YEAR`, `Make`, `Model`, `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`, `SALE_PRICE`, `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`, `SALE_DATE`) 
    VALUES 
    ('LAKSDFJ234LASKRF2', '2009', 'Dodge', 'Durango', 'SLT', 'Silver', 'Black', '2700', NULL, '2000', '144000', '4WD Automatic', '2012-12-05', NULL);";


    if ($mysqli->query($query)) {
        echo "<p>Dodge Durango inserted into inventory table.</p>";
    }
    else
    {
        echo "<p>Error Inserting Dodge: </p>" . mysql_error();
        echo "<p>***********</p>";
        echo $query ;
        echo "<p>***********</p>";
    }
    $mysqli->close();
} catch (Throwable $e) {
    echo $e;
}
include 'footer.php';
?>