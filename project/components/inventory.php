<?php
    include 'db.php';
    include 'queryOutput.php';
    $loggedin = $_COOKIE['loggedIn'] ?? false;
    $user = $_COOKIE['user'] ?? '';
    if ($loggedin)
        echo <<<HTML
        <p>Welcome $user</p>
        <a href='?pg=logout'>Logout</a>
        HTML;
    else
        echo "<p><a href='?pg=login'>Login</a> to add/edit/delete items</p>";
    $query = "select * from inventory order by name";
    try {
        extract(queryOutput($mysqli,$query));
        foreach ($headers as &$header) {
            if ($header != 'id') $header = ucfirst($header);
        }
        if ($loggedin) {
            $headers['actions'] = '';
            foreach ($rows as &$row) {
                $row['actions'] = <<<HTML
                <button class='edit' onclick='editBtn(this)'><img src='images/edit.svg' alt='Edit'></button>
                <button class='delete' onclick='delBtn(this)'><img src='images/del.svg' alt='Delete'></button>
                HTML;
            }
        }
        outputHtml($headers,$rows);
    } catch (Throwable $th) {
        echo $th;
    }
    if ($loggedin) {
        echo <<<HTML
        <button id='add' class='add'><img src='images/add.svg' alt='Add'></button>
        HTML;
    }
?>
