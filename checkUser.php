<?php
    include 'db.php';
    include 'checks.php';
    header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (checkIfUserExists($mysqli, $data['username']))
            echo json_encode(['userExists' => true]);
        else {
            $query = <<<SQL
            insert into users(name,username,password) values('{$data['name']}','{$data['username']}','{$data['password']}');
            SQL;
            $res = $mysqli->query($query);
        }
    }
?>