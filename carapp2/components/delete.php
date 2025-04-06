<?php
    include 'db.php';
    include_once 'queryOutput.php';
    $query = 'select VIN,Make,Model,ASKING_PRICE as Price from inventory';
    try {
        $output = queryOutput($mysqli,$query);
        $headers = $output['headers'];
        $rows = $output['rows'];
        foreach ($rows as $key=>$row) {
            (function()use($key,&$row,&$rows){
                $vin = $row['VIN'];
                $row['del_link']="<a href='?vin=$vin&pg=deleteCar'>Delete</a>";
                unset($row['VIN']);
                $rows[$key]=$row;
            })();
        }
        array_shift($headers);
        array_push($headers,'');
        outputHtml($headers,$rows,4);
    } catch (Throwable $th) {
        echo $th;
    }
?>