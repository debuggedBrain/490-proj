<?php
require_once('rmq/testRabbitMQClient.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$username1 = "matt\n";
$username2 = "matt";
//$username2 = $_POST["username3"];
echo "just a test $username2";
?>

