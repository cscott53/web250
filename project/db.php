<?php
try {
    $host = $_SERVER['HTTP_HOST'];
    if (str_contains($host,'infinityfree'))
        $mysqli = new mysqli('sql111.infinityfree.com', 'if0_38310603', 'uBHu8fW6r5', 'if0_38310603_project' );
    elseif (str_contains($host,'localhost')) {
        $mysqli = new mysqli('localhost','root','');
        $createDB = <<<SQL
        create database if not exists project;
        SQL;
        $mysqli->query($createDB);
        $mysqli->select_db('project');
    }
    if (mysqli_connect_errno())
        die("Connect failed: %s\n".mysqli_connect_error());
} catch (Throwable $e) {
    echo $e;
}
?>