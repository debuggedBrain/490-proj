<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('../tester.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$request = array();
$request['type'] = "login";
$request['username'] = $username2;
$request['password'] = "coolguy";
$request['message'] = "HI";
$response = $client->send_request($request);
//$response = $client->publish($request);

$array1 = $request;

echo "client received response: ".PHP_EOL; 
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
