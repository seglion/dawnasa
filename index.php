
<?php 
require("auth.php");
require("nasaLogic.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesIndex.css">
    <title>Nasa App</title>
</head>

<body>
    <header>
        <nav>
            <div class="nav-logo">
                <img id='logo' src="assets/Nasa_logo.svg" alt="Logo Nasa">
            </div>
            <div class="nav-form">
                <form method="GET">
                    <input
                        type="date"
                        id="calendar"
                        name="calendar"
                        min="1995-06-16"
                        max="<?php echo date('Y-m-d'); ?>"
                        value="<?php echo isset($_GET['calendar']) ? $_GET['calendar'] : date('Y-m-d'); ?>">
                    <input type="submit" value="Send Reques">
                </form>
            </div>
            <div class="nav-logout">
                <a href="logout.php" id="logout">Logout</a>
            </div>
        </nav>
    </header>
    <div class="content">
        <aside>
            <div class="user">
                <h3><?php echo strtoupper($_SESSION['name']) ?></h3>
                <h4>Limite de peticiones: <?php echo $totallimit ?></h4>
                <h4>Peticiones usadas: <?php echo $usedRequest ?></h4>
                <h4>Peticiones restantes: <?php echo $remainRequest ?></h4>
            </div>
            <div>
                <h2 class="meteor">Asteroides cercanos</h2>
                <img id="meteor" src="assets\meteor.png" alt="meteor image">

            </div>
            <div class="totalmeteor">
                <h4>Numero asteroides = <?php echo($jsonAsteorides ->element_count)?></h4>
                <h4>Peligrosos = <?php echo($asteroides->warnings)?></h4>
            </div>
            <?php
            
            if($asteroides->warnings>0){

                foreach($asteroides->warnAste as $ast) {
                    echo("<div class='warMet'>
                        <h4> $ast->name </h4>
                        <h5>Diametro: " . number_format($ast->diameter, 2) . " </h5>
                        <h5>Velocidad: " . number_format($ast->velocity, 2) . " Km/s</h5>
                        <h5>Distancia: " . number_format($ast->distance, 2) . " Lunar</h5>
                        <h5>Orbita: " . $ast->orbit . "</h5>
                        </div>");
                }
        }
            
            
            ?>
            

        </aside>
        <main>
            <?php
            echo ("<h2> " . $json->title . "</h2>");
            if ($json->media_type== "image" ) {
                echo ("<img src=" . $json->url . ">");
                echo ("<a href='download.php?url=" . urlencode($json->url) . "' class='download-button'>Descargar imagen</a>");
            }
            else{
                echo("<iframe  style='width: 70%; aspect-ratio: 16 / 9; border: none;' src=" . $json->url . "?autoplay=1&cc_load_policy=1  >

                        </iframe>");

            };


            echo ("<p>" . $json->explanation . "</p>");
            ?>
        </main>
    </div>
    <footer></footer>
</body>

</html>