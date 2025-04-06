<a href="?pg=table">&larr;Back</a><br>
<?php
    include 'db.php';
    include_once 'queryOutput.php';
    if($_GET['pg']=='deleteCar'){
        extract($_GET);
        try {
            $query="delete from inventory where VIN='$vin'";
            $vin_query=queryOutput($mysqli,"select VIN
                                from inventory
                                where VIN = '$vin'")['rows'];
            if(count($vin_query)>0) {
                //this vin doesn't already exist in table so it can be inserted
                $mysqli->query($query);
                echo "Successfully deleted car with VIN $vin<br>";
            } else echo "A car with VIN $vin doesn't exist<br>";
        } catch (Throwable $th) {
            echo $th;
        }
    }
?>