<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        http_response_code(204);
        exit;
    }
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo json_encode(['error' => 'Invalid request method']);
        exit;
    }
    $data = json_decode(file_get_contents('php://input'), true);
    $action = $data['action'] ?? '';
    $query = '';
    switch($action) {
        case 'add':
            $query = "insert into inventory (id,name,quantity,price) values ('{$data['id']}','{$data['name']}',{$data['quantity']},{$data['price']})";
            break;
        case 'edit':
            $query = "update inventory set name='{$data['name']}', quantity={$data['quantity']}, price={$data['price']} where id='{$data['id']}'";
            break;
        case 'del':
            $query = "delete from inventory where id='{$data['id']}'";
            break;
        default:
            break;
    }
    try {
        $result = $mysqli->query($query);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => $query . "\n" . $mysqli->error]);
        }
    } catch (Throwable $th) {
        echo json_encode(['error' => $query . "\n" . $th->getMessage()]);
    }
?>