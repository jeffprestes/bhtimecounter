<?php
$arquivo = "/var/www/bhtimecounter/timer.dat";
$portaSerial = "/dev/tty.usbmodem1411";
date_default_timezone_set("Etc/Universal");

// pass in the number of seconds elapsed to get hours:minutes:seconds returned
function secondsToTime($s) {
    $s = ($s-time());
    
    if ($s<0)   {
        $s = 0;
    }
    
    $h = floor($s / 3600);
    $s -= $h * 3600;
    $m = floor($s / 60);
    $s -= $m * 60;
    return $h.':'.sprintf('%02d', $m).':'.sprintf('%02d', $s);
}

//Write in dat file the seconds remaining
function escreveSegundos($arquivo, $tempo, $segundos, $farol = 1)   {
    $file = fopen($arquivo, "w");
    
    if (!file)  {
        echo php_uname();
        echo PHP_OS;
        phpinfo();
    }
    
    if ($file>0)    {
        fwrite($file, ($tempo+$segundos) . "|" . $segundos . "|" . $farol);
        fclose($file);
    }
}

//Read the seconds remain to time up
function lerSegundos($arquivo, $qualDado = 0)  {
     if (!file_exists($arquivo))     {
        return 0;
    }
    
    $file = fopen($arquivo, "r");
    if (!$file)     {
        return 0;
    }
    
    $temp = explode("|",fread($file, filesize($arquivo)));
    
    if ($qualDado==0)    {
        $secs = $temp[0];
    }   else if ($qualDado==1)   {
        $secs = $temp[1];
    }   else if ($qualDado==2)  {
        $secs = $temp[2];
    }
    
    fclose($file);
    
    return $secs;
}

function escreveHeader($acao = null)       {
    $page = $_SERVER['PHP_SELF'];
    $sec = "1";
    if (is_null($acao)) {
        header("url=$page");
    }   else    {
        header("Refresh: $sec; url=$page?action=$acao");
    }
}

function vermelho() {
    sendCommand('R');
}

function verde()    {
    sendCommand('G');
}

function amarelo()  {
    sendCommand('Y');
}

function desliga()  {
    sendCommand('O');
}

function sendCommand($arg)  {
    try     {
        $command = 'python /Users/jprestes/projetos/bhtimecounter/serialstage.py ' . $arg;
        exec($command);
    } catch (Exception $e)    {
        echo $e->getMessage();
        echo $e->getTraceAsString();
        exit;
    }
}