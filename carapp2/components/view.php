<?php
    include 'db.php';
    include 'queryOutput.php';
    $query = 'select Make,Model,ASKING_PRICE as Price from inventory order by Make';
    try {
        $output = queryOutput($mysqli,$query);
        $headers = $output['headers'];
        $rows = $output['rows'];
        outputHtml($headers,$rows,3);
    } catch (Throwable $th) {
        echo $th;
    }
?>
