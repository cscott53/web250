<h2>Car app1</h2>
<button id="add">Add new car</button>
<div id="addForm" class="form">
    <?php include 'add.php'?>
</div>
<br>
<?php
    include 'db.php';
    include_once 'queryOutput.php';
    $query = 'select VIN,Make,Model,ASKING_PRICE as Price,YEAR as Year from inventory order by Make';
    try {
        $output = queryOutput($mysqli,$query);
        $headers = $output['headers'];
        $rows = $output['rows'];
        foreach ($rows as $key=> $row) {
            (function()use($key,&$row,&$rows){
                $vin = $row['VIN'];
                $make = $row['Make'];
                $model = $row['Model'];
                $price = $row['Price'];
                $year = $row['Year'];
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
<br>
<script>
    let addForm = document.getElementById('addForm'),
        addCar = document.getElementById('add'),
        cancelAdd = document.getElementById('cancelAdd');
    document.querySelectorAll('.del_link').forEach((e) => {
        e.onclick=(ev) => {
            if (!confirm('Are you sure you want to delete this car?'))
                ev.preventDefault();
        };
    });
    addForm.style.display = 'none';
    addCar.onclick=() => {
        addCar.style.display = 'none';
        addForm.style.display = 'block';
    };
    cancelAdd.onclick=() => {
        addForm.querySelectorAll('input').forEach((e) => 
            e.value = ''
        );
        addForm.style.display = 'none';
        addCar.style.display = 'block';
    };
</script>