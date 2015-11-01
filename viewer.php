<?php
require './functions.php';

//Obtain seconds
$farol = lerSegundos($arquivo, 2);

if ($farol==0)  {
    $segFaltantes = lerSegundos($arquivo, 1);
    $segundos = time()+$segFaltantes;
}   else if ($farol==1)    {
    $segundos = lerSegundos($arquivo);
}

escreveHeader("continue");

$timeWatch = secondsToTime($segundos);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Battlehack Time Counter - Stopwatch</title>
        <script>
            
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bhtimecounter.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="spacer"></div>
        <div id="container">
            <div id="stopwatch">
                <?=$timeWatch?>
            </div>
        </div>
    </body>
    
</html>
