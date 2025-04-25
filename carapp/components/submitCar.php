<a href="?pg=table" class="backBtn">&larr;Back</a>
<?php
    include 'db.php';
    include_once 'queryOutput.php';
    if($_GET['pg']=='submitCar'){
        extract($_GET);
        //gets vin,make,model,price from query params
        try {
            $query="insert into inventory
                    (VIN,Make,Model,ASKING_PRICE,YEAR)
                    values('$vin','$make','$model',$price,$year)";
            $vin_query=queryOutput($mysqli,"select VIN
                                from inventory
                                where VIN = '$vin'")['rows'];
            if(count($vin_query)==0) {
                //this vin doesn't already exist in table so it can be inserted
                $res=$mysqli->query($query);
                echo $mysqli->error."<br>Successfully inserted $year $make $model into the database<br>";
            } else echo "A car with VIN $vin already exists<br>";
        } catch (Throwable $th) {
            echo $th;
        }
    }
?>