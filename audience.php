<?php
$levelNumber = time();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Battlehack Time Counter - Audience Animation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bhtimecounter.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="container">
            <div id="title"><h1>Battlehack Time Counter - Audience Animation</h1></div>
            <div id="graph">
                <?=levelNumber?>
            </div>
        </div>
    </body>
</html>
