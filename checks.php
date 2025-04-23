<?php
    function checkIfRowExists($mysqli,$table,$column,$value){
        $query = <<<SQL
        select * from $table where $column = '$value';
        SQL;
        $res = $mysqli->query($query);
        return $res->num_rows > 0;
    }
    function checkIfUserExists($mysqli,$username){
        return checkIfRowExists($mysqli,'users','username',$username);
    }
?>