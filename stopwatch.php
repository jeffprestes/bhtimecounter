<?php
require_once './functions.php';
$action = $_GET["action"];
$duracao = 30;

//Obtain seconds
$segundos = lerSegundos($arquivo);


if ($action == "reset")     {
    escreveSegundos($arquivo, time(), $duracao, 0);
    $segundos = lerSegundos($arquivo);
    desliga();
    
} else if ($action=="start")   {
    $segFaltantes = lerSegundos($arquivo,1);
    escreveSegundos($arquivo, time(), $segFaltantes, 1);
    $segundos = lerSegundos($arquivo);
    escreveHeader("continue");
    verde();
    
} else if ($action=="stop")    {  
    escreveSegundos($arquivo, time(), ($segundos-time()), 0);
    escreveHeader();
    desliga();
    
} else if (($action=="continue") && (time()<$segundos))   {
    if (($segundos-time())<=15)  {
        amarelo();
    }   
    escreveHeader("continue");
    
}   else    {   
    escreveSegundos($arquivo, time(), -1, 0);
    vermelho();
    escreveHeader();
}   

$timeWatch = secondsToTime($segundos);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Battlehack's Presentations - Countdown</title>
        <script>
            
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bhtimecounter.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="container">
            <div id="title"><h1>Battlehack's Presentations<br />Countdown</h1></div>
            <div id="stopwatch">
                <?=$timeWatch?>
            </div>
            <div id="actions">
                <button id="btnStart" alt="Start Stopwatch" onclick="document.location='stopwatch.php?action=start'">Start</button>
                <span class="space"></span>
                <button id="btnStop" alt="Stop Stopwatch" onclick="document.location='stopwatch.php?action=stop'" <? if ($action=="reset") { echo "disabled=\"disabled\""; } ?> >Stop</button>
                <span class="space"></span>
                <button id="btnReset" alt="Stop Stopwatch" value="Reset" onclick="document.location='stopwatch.php?action=reset'" >Reset</button>
            </div>
        </div>
    </body>
    
</html>
