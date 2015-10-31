<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Battlehack Time Counter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bhtimecounter.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="container">
            <div id="title"><h1>Battlehack Time Counter</h1></div>
            <div id="menu">
                <div class="menuItem">
                    <input type="button" alt="Stopwatch Controler" value="Stopwatch" id="btnStopwatch" onclick="document.location='stopwatch.php'" />
                </div>
                <div class="menuItem">
                    <input type="button" alt="Audience's animation" value="Audience's Animation" id="btnAudience" onclick="document.location='audience.php'" />
                </div>
                <div class="menuItem">
                    <input type="button" alt="Stopwatch Viewer" value="Stopwatcher Viewer" id="btnStopwatchViewer" onclick="document.location='viewer.php'" />
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
