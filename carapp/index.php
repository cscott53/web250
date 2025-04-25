<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calm Sheep's used cars</title>
    <link rel="stylesheet" href="styles/default.css">
    <link rel="stylesheet" href="../styles/default.css">
    <script defer src="../scripts/main.js"></script>
    <script src="https://lint.page/kit/880bd5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="page">
        <header>
            <?php include '../components/header.php'?>
        </header>
        <main>
            <?php
                $pages=['table','submitCar','editCar','updateCar','deleteCar'];
                foreach ($pages as $page) {
                    $class = 'content';
                    if ($page == 'editCar') $class.=' form';
                    echo "<div class='$class' id='$page'>\n";
                    include "components/$page.php";
                    echo "</div>";
                }
            ?>
        </main>
        <footer>
            <nav>
                <ul>
                    <li><a href="https://github.com/cscott53">GitHub</a></li>
                    <li><a href="https://cscott53.github.io">GitHub.io</a></li>
                    <li><a href="https://cscott53.infinityfreeapp.com/web250">WEB250.io</a></li>
                    <li><a href="https://www.freecodecamp.org/cscott53">freeCodeCamp</a></li>
                    <li><a href="https://www.codecademy.com/profiles/method4794308211">Codecademy</a></li>
                    <li><a href="https://jsfiddle.net/u/cscott53/">JSFiddle</a></li>
                    <li><a href="https://www.linkedin.com/in/charles-scott-545b4228a/">LinkedIn</a></li>
                </ul>
            </nav>
        </footer>
    </div>
</body>
</html>