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
        echo "<table>\n<thead><tr>\n";
        foreach ($headers as $header) {
            echo "<th class='$header'>$header</th>\n";
        }
        echo "</tr></thead>\n<tbody>\n";
        foreach ($rows as $row) {
            echo "<tr>\n";
            foreach ($row as $key => $value) {
                echo "<td class='$key'>$value</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</tbody>\n</table>";
    }
?>