<?php
require 'OS_BR.php';
require 'antiinject.php';
require 'antixss.php';
require "Logger.php";
$obj = new OS_BR();

if (isset($_POST['emailto']) && isset($_POST['subject']) && isset($_POST['message'])) {
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
    if(!antiinject($_POST['emailto']) || !antiinject($_POST['subject']) || !antiinject($_POST['message'])){
        $current.="SQL Injection: Possible SQL Injection\n";
    }else{
        $current.="SQL Injection: None Detected\n";
    }
    if(!antixss($_POST['emailto']) || !antixss($_POST['subject']) || !antixss($_POST['message'])){
        $current.="XSS attack: Possible XSS attack\n";
    }else{
        $current.="XSS attack: None Detected\n";
    }

    Logger::log($current);

    header("Location: /controlpanel.php");
}
?>
