<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calm Sheep's used cars</title>
    <link rel="stylesheet" href="../styles/default.css">
    <link rel="stylesheet" href="styles/default.css">
    <script src="../scripts/requests.js"></script>
    <script src="https://lint.page/kit/880bd5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="page">
        <header>
            <?php include '../components/header.php'?>
        </header>
        <main>
            <?php
                if (isset($_GET['pg']))
                    include 'components/'.$_GET['pg'].'.php';
                else
                    include 'components/table.php';
            ?>
        </main>
        <footer>
            <?php include '../components/footer.php'?>
        </footer>
    </div>
</body>
</html>