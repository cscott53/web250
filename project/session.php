<?php
    if (session_id() == '') session_start();
    header('Content-Type: application/json');
    ob_end_clean();
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        echo session_id() == ''
        ? json_encode(['error' => 'Session not started'])
        : json_encode($_SESSION);
    else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $session = json_decode(file_get_contents('php://input'), true);
        if (session_id() != '' && $session) {
            foreach ($session as $key => $value)
                if ($key != 'PHPSESSID') $_SESSION[$key] = $value;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Invalid session']);
        }
    }
?>