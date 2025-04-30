<p><a href="?pg=login">Login</a> to add/edit/delete cars</p>
<?php
    include 'db.php';
    include_once 'queryOutput.php';
    $query = 'select VIN,Make,Model,ASKING_PRICE as Price,YEAR as Year from inventory order by Make';
    $query2=<<<SQL
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
    FROM inventory
    SQL;
    try {
        $output = queryOutput($mysqli,$query);
        $headers = $output['headers'];
        $rows = $output['rows'];
        $everything = queryOutput($mysqli,$query2)['rows'];
        foreach ($rows as $key=> $row) {
            (function()use($key,&$row,&$rows,&$everything){
                $vin = $row['VIN'];
                $make = $row['Make'];
                $model = $row['Model'];
                $price = $row['Price'];
                $year = $row['Year'];
                $trim = $everything[$key]['trim'];
                $color = $everything[$key]['color'];
                $interior = $everything[$key]['interior'];
                $mileage = $everything[$key]['mileage'];
                $transmission = $everything[$key]['transmission'];
                $row['Make']="<a class='view_link' href='?vin=$vin&pg=viewCar'>$make</a>";
                $encodedMake = urlencode($make);
                $encodedModel = urlencode($model);
                unset($row['VIN']);
                $rows[$key]=$row;
            })();
        }
        array_shift($headers);
        outputHtml($headers,$rows,4);
    } catch (Throwable $th) {
        echo $th;
    }
?>