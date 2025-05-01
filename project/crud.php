<?php
    include 'db.php';
    header('Content-Type: application/json');
    switch($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "insert into inventory (id,name,quantity,price) values ('{$data['id']}','{$data['name']}',{$data['quantity']},{$data['price']})";
            break;
        case 'PUT':
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "update inventory set name='{$data['name']}', quantity={$data['quantity']}, price={$data['price']} where id='{$data['id']}'";
            break;
        case 'DELETE':
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "delete from inventory where id='{$data['id']}'";
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not supported']); //probably won't happen
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