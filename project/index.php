<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charles Scott - Calm Sheep - WEB250 - Final Project</title>
    <link rel="stylesheet" href="../styles/default.css">
    <script src="https://lint.page/kit/880bd5.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include '../components/header.php' ?>
    </header>
    <main>
        <?php
            $page = isset($_GET['pg']) ? $_GET['pg'] : 'home';
            include "components/$page.php";
        ?>
    </main>
    <footer>
        <?php include '../components/footer.php' ?>
    </footer>
</body>
</html>