<?php
    include 'db.php';
    include_once 'queryOutput.php';
    $query = 'select VIN,Make,Model,ASKING_PRICE as Price,YEAR as Year from inventory order by Make';
    try {
        $output = queryOutput($mysqli,$query);
        $headers = $output['headers'];
        $rows = $output['rows'];
        foreach ($rows as $key=>$row) {
            (function()use($key,&$row,&$rows){
                $vin = $row['VIN'];
                $make = $row['Make'];
                $model = $row['Model'];
                $price = $row['Price'];
                $year = $row['Year'];
                $row['edit_link']="<a href='?vin=$vin&pg=editCar'>Edit</a>";
                unset($row['VIN']);
                unset($row['Year']);
                $rows[$key]=$row;
            })();
        }
        array_shift($headers);
        $headers[count($headers)-1]='';
        outputHtml($headers,$rows,4);
    } catch (Throwable $th) {
        echo $th;
    }
?>