<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calm Sheep's used cars</title>
    <link rel="stylesheet" href="styles/default.css">
    <link rel="stylesheet" href="../styles/default.css">
    <script defer src="../scripts/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            for(let i=2; i<=12; i++)
                document.querySelectorAll('.cols'+i)
                    .forEach(el=>el.style.gridTemplateColumns=`repeat(${i},1fr)`)
        })
    </script>
</head>
<body>
    <div id="page">
        <header>
            <h1>Calm Sheep's used cars</h1>
            <nav>
                <ul>
                    <li><a href="../?pg=index">Home</a></li>
                    <li><a href="../?pg=intro">Intro</a></li>
                    <li><a href="../?pg=contract">Contract</a></li>
                    <li><a class="content-link" href="?pg=view">Used Cars</a></li>
                    <div class="flexbreak"></div>
                    <li><a class="content-link" href="?pg=view">View cars</a></li>
                    <li><a class="content-link" href="?pg=add">Add a car</a></li>
                    <li><a class="content-link" href="?pg=edit">Edit a car</a></li>
                    <li><a class="content-link" href="?pg=delete">Delete a car</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
                $pages=['view','add','edit','delete','submitCar','editCar','updateCar','deleteCar'];
                foreach ($pages as $page) {
                    echo "<div class='content' id='$page'>\n";
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