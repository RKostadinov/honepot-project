<?php
require 'OS_BR.php';
$obj = new OS_BR();

if (isset($_POST['emailto']) && isset($_POST['subject']) && isset($_POST['message'])) {
    var_dump("AZ SUM QKO TUP");
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
    file_put_contents($file, $current, FILE_APPEND);
//    file_put_contents($file, 'Rada e velika', FILE_APPEND);
    header("Location: /controlpanel.php");
}
?>
