<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calm Sheep's used cars</title>
    <link rel="stylesheet" href="styles/default.css">
    <link rel="stylesheet" href="../styles/default.css">
    <script src="../scripts/requests.js"></script>
    <script src="https://lint.page/kit/880bd5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="page">
        <header>
            <?php include '../components/header.php'?>
        </header>
        <main>
            <h2>Car app 2</h2>
            <h3>Welcome, <?= $_COOKIE['user'] ?></h3>
            <?php
                $page = isset($_GET['pg']) ? $_GET['pg'] : 'table';
                include "components/$page.php";
            ?>
        </main>
        <footer>
            <?php include '../components/footer.php'?>
        </footer>
    </div>
    <script>
        if (location.search.includes('pg=table') && document.cookie.includes('loggedIn=true'))
            location.href = '?pg=userTable';
        else if (location.search.includes('pg=userTable') && !document.cookie.includes('loggedIn=true'))
            location.href = '?pg=table';
    </script>
</body>
</html>