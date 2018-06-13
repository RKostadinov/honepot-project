<?php
// Button Logger
require "Logger.php";
require "OS_BR.php";

$obj = new OS_BR();
$server = $_GET['server'];
$action = $_GET['action'];


switch ($server) {
    case "dc":
        $server = "Domain Controller";
        break;
    case "db":
        $server = "Database";

        break;
    case "web":
        $server = "Website";

        break;
    case "fw":
        $server = "Firewall";

        break;
}
$current = "-----------------" . date('m/d/Y h:i:s', time()) . "------------------\n";
$current .= "Server: {$server}\n";
$current .= "Action: {$action}\n";
$current .= "IP:{$_SERVER['REMOTE_ADDR']}\n";
$current .= "Browser: " . $obj->showInfo('browser') . " " . $obj->showInfo('version') . "\n";
$current .= "OS: " . $obj->showInfo('os') . "\n";
$referrer = $_SERVER['HTTP_REFERER'] . "\n";
if ($referrer == "") {
    $current .= "Referer: This page was accessed directly\n";
} else {
    $current .= "Referer: " . $referrer;
}

Logger::log($current);
header("Location: controlpanel.php");


