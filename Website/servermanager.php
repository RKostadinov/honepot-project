<?php
// Button Logger

require "Logger.php";

$server = $_GET['server'];
$action = $_GET['action'];


switch ($server){
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

$message = $server . ":" . $action . "\n";

Logger::log($message);
header("Location: controlpanel.php");


