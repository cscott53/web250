<?php
    include 'db.php';
    include '../checks.php';
    header('Content-Type: application/json');
    ob_end_clean();
    try {
    if (!$mysqli) {
        echo json_encode(['error' => 'Database connection failed']);
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!checkIfUserExists($mysqli, $data['username']))
            echo json_encode(['userExists' => false]);
        else {
            $password = $data['password'];
            $username = $data['username'];
            $query = <<<SQL
            select password from users where username = '$username';
            SQL;
            $res = $mysqli->query($query);
            $row = $res->fetch_assoc();
            if ($row['password'] == $password)
                echo json_encode(['loggedIn' => true]);
            else
                echo json_encode(['loggedIn' => false]);
        }
    }
    } catch (Throwable $th) {
        echo json_encode(['error' => $th->getMessage()]);
    }
    $mysqli->close();
?>