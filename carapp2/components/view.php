<?php
    include 'db.php';
    $vin=$_GET['vin'];
    $query=<<<SQL
    SELECT 
    Make as make,
    Model as model,
    Year as year,
    ASKING_PRICE as price,
    TRIM as trim,
    EXT_COLOR as color,
    INT_COLOR as interior,
    MILEAGE as mileage,
    TRANSMISSION as transmission
    FROM inventory WHERE VIN='$vin'
    SQL;
    $res=$mysqli->query($query);
    if ($res->num_rows == 0)
        echo "No car with VIN $vin found";
    else {
        $row=$res->fetch_assoc();
        echo <<<HTML
        <h2>Car Details</h2>
        VIN: $vin<br>
        Make: ${row['make']}<br>
        Model: ${row['model']}<br>
        Year: ${row['year']}<br>
        Price: ${row['price']}<br>
        Trim: ${row['trim']}<br>
        Exterior Color: ${row['color']}<br>
        Interior Color: ${row['interior']}<br>
        Mileage: ${row['mileage']}<br>
        Transmission: ${row['transmission']}<br>
        <a href="?pg=table">&larr;Back</a><br>
        HTML;
    }
?>