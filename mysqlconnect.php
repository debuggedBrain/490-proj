#!/usr/bin/php
<?php
//Here is where we will input a chosen computer to hold database
$mydb = new mysqli('127.0.0.1','root','12345','testdb');

if ($mydb->errno != 0)
{
        echo "failed to connect to database: ". $mydb->error . PHP_EOL;
        exit(0);
}

echo "successfully connected to database".PHP_EOL;
//Will rename students user based on ALi's database
$query = "select * from students;";
//must fix response in Client.php to match with mysqlconnect
$response = $mydb->query($query);
if ($mydb->errno != 0)
{
        echo "failed to execute query:".PHP_EOL;
        echo __FILE__.':'.__LINE__.":error: ".$mydb->error.PHP_EOL;
	exit(0);
}


?>

