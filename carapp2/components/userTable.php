<button id="add">Add new car</button>
<div id="addForm" class="form">
    <?php include 'add.php'?>
</div>
<br>
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
                $row['links']=<<<HTML
                <a class='edit_link' href='?vin=$vin&make=$encodedMake&model=$encodedModel&year=$year&price=$price&pg=editCar'>
                    <img src="images/edit.svg" alt="Edit">
                </a>
                <a class='del_link' href='?vin=$vin&pg=deleteCar'>
                    <img src="images/del.svg" alt="Delete">
                </a>
                HTML;
                unset($row['VIN']);
                //unset($row['Year']);
                $rows[$key]=$row;
            })();
        }
        array_shift($headers);
        $headers[]='';
        outputHtml($headers,$rows,4);
    } catch (Throwable $th) {
        echo $th;
    }
?>
<script>
    let addForm = document.getElementById('addForm'),
        addCar = document.getElementById('add'),
        cancelAdd = document.getElementById('cancelAdd')
    document.querySelectorAll('.del_link').forEach((e) => {
        e.onclick=(ev) => {
            if (!confirm('Are you sure you want to delete this car?'))
                ev.preventDefault()
        }
    })
    addForm.style.display = 'none'
    addCar.onclick=() => {
        addCar.style.display = 'none'
        addForm.style.display = 'block'
    }
    cancelAdd.onclick=() => {
        addForm.querySelectorAll('input').forEach((e) => {
            e.value=''
        })
        addForm.style.display = 'none'
        addCar.style.display = 'block'
    }
</script>