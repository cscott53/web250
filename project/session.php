<?php
    header('Content-Type: application/json');
    ob_end_clean();
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        echo json_encode($_SESSION);
    else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $session = json_decode(file_get_contents('php://input'), true);
        if ($session['PHPSESSID'] == session_id()) {
            $_SESSION = $session;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Invalid session']);
        }
    }
?>