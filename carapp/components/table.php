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
                $row['links']=
                "<a class='edit_link' href='?vin=$vin&make=".urlencode($make).
                "&model=".urlencode($model)."&year=$year&price=$price&pg=editCar'>Edit</a> " .
                "<a class='del_link' href='?vin=$vin&pg=deleteCar'>Delete</a>";
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
    addCar.onclick=()=>{
        addCar.style.display = 'none'
        addForm.style.display = 'block'
    }
    cancelAdd.onclick=()=>{
        addForm.querySelectorAll('input').forEach(e => {
            e.value=''
        })
        addForm.style.display = 'none'
        addCar.style.display = 'block'
    }
</script>