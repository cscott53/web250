<?php
    function queryOutput($mysqli,$query) {
        $table_rows=array();
        try {
            $result = $mysqli->query($query);
            while ($row=mysqli_fetch_assoc($result))
                $table_rows[]=$row;
            $headers=[];
            if(count($table_rows)>0)
                foreach ($table_rows[0] as $key => $value)
                    $headers[] = $key;
            return ['headers' => $headers,'rows' => $table_rows];
        } catch (Throwable $th) {
            throw $th;
        }
    }
    function outputHtml($headers,$rows,$cols) {
        echo "<div class='table cols$cols'>\n";
        foreach ($headers as $header) {
            echo "<div class='$header th'>$header</div>\n";
        }
        foreach ($rows as $row) {
            foreach ($row as $key => $value) {
                echo "<div class='$key'>$value</div>\n";
            }
        }
        echo '</div>';
    }
?>