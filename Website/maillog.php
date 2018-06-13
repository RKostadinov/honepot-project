<?php
require 'OS_BR.php';
require 'antiinject.php';
$obj = new OS_BR();

if (isset($_POST['emailto']) && isset($_POST['subject']) && isset($_POST['message'])) {
    $file = 'FormAttempts.log';
    $current = "-----------------" . date('m/d/Y h:i:s', time()) . "------------------\n";
    $current .= "Email: {$_POST['emailto']}\n";
    $current .= "Subject: {$_POST['subject']}\n";
    $current .= "Message:{$_POST['message']}\n";
    $current .= "IP:{$_SERVER['REMOTE_ADDR']}\n";
    $current .= "Browser: " . $obj->showInfo('browser') . " " . $obj->showInfo('version') . "\n";
    $current .= "OS: " . $obj->showInfo('os') . "\n";
    $referrer = $_SERVER['HTTP_REFERER'] . "\n";
    if ($referrer == "") {
        $current .= "Referer: This page was accessed directly\n";
    } else {
        $current .= "Referer: " . $referrer;
    }
    if(!antiinject($_POST['emailto'], false) || !antiinject($_POST['subject'], false) || !antiinject($_POST['message'],false)){
        $current.="SQL Injection: Possible SQL Injection\n";
    }else{
        $current.="SQL Injection: None Detected\n";
    }


    file_put_contents($file, $current, FILE_APPEND);
    header("Location: /controlpanel.php");
}
?>
