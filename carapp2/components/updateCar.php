<a href="?pg=table">&larr;Back</a><br>
<?php
    include 'db.php';
    include_once 'queryOutput.php';
    if($_GET['pg']=='updateCar'){
        extract($_GET);
        try {
            $query=<<<SQL
            update inventory
                    set VIN='$vin',
                        Make='$make',
                        Model='$model',
                        ASKING_PRICE=$price,
                        YEAR=$year,
                        TRIM='$trim',
                        EXT_COLOR='$color',
                        INT_COLOR='$interior',
                        MILEAGE=$mileage,
                        TRANSMISSION='$transmission'
                    where VIN='$vin'
            SQL;
            $vin_query=queryOutput($mysqli,"select VIN
                                from inventory
                                where VIN = '$vin'")['rows'];
            if(count($vin_query)>0) {
                $mysqli->query($query);
                echo "Successfully updated car with VIN $vin<br>";
            } else echo "A car with VIN $vin doesn't exist<br>";
        } catch (Throwable $th) {
            echo $th;
        }
    }
?>