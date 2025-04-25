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
        // print_r($everything);
        foreach ($rows as $key=>$row) {
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
                $row['Make']="<a href='?vin=$vin&pg=viewCar'>$make</a>";
                $row['links']=
                "<a class='edit_link' href='?vin=$vin&make=".urlencode($make)."&model=".urlencode($model).
                "&year=$year&price=$price&trim=$trim&color=$color&interior=$interior&mileage=$mileage&transmission=$transmission&pg=editCar'>Edit</a> " .
                "<a class='del_link' href='?vin=$vin&pg=deleteCar'>Delete</a>";
                unset($row['VIN']);
                unset($row['Year']);
                $rows[$key]=$row;
            })();
        }
        array_shift($headers);
        echo"<div id='headerthing'>{$headers[count($headers)-1]}</div>";
        outputHtml($headers,$rows,4);
    } catch (Throwable $th) {
        echo $th;
    }
?>
<br>
<button id="add">Add new car</button>
<div id="addForm" class="form">
    <?php include 'add.php'?>
</div>
<script>
    let addForm = document.getElementById('addForm'),
        addCar = document.getElementById('add'),
        cancelAdd = document.getElementById('cancelAdd')
    document.querySelectorAll('.del_link').forEach(e => {
        e.onclick=ev=>{
            if(!confirm('Are you sure you want to delete this car?'))
                ev.preventDefault()
        }
    })
    addForm.style.display = 'none'
    addCar.onclick=() => {
        addCar.style.display = 'none'
        addForm.style.display = 'block'
    }
    cancelAdd.onclick=() => {
        addForm.querySelectorAll('input').forEach(e => {
            e.value=''
        })
        addForm.style.display = 'none'
        addCar.style.display = 'block'
    }
</script>