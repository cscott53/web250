<a href="?pg=table" class="backBtn">&larr;Back</a><br>
<?php
    include 'db.php';
    include_once 'queryOutput.php';
    if($_GET['pg']=='updateCar'){
        extract($_GET);
        try {
            $query="update inventory
                    set VIN='$vin',
                        Make='$make',
                        Model='$model',
                        ASKING_PRICE=$price,
                        YEAR=$year
                    where VIN='$vin'";
            $vin_query=queryOutput($mysqli,"select VIN
                                from inventory
                                where VIN = '$vin'")['rows'];
            if(count($vin_query)>0) {
                //this vin doesn't already exist in table so it can be inserted
                $mysqli->query($query);
                echo "Successfully updated car with VIN $vin<br>";
            } else echo "A car with VIN $vin doesn't exist<br>";
        } catch (Throwable $th) {
            echo $th;
        }
    }
?>