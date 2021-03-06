<?php

class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("127.0.0.1","ali","password","490_db");

	if ($this->logindb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "Correctly connected to database".PHP_EOL;
}

public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from users where username = '$un'";
	$response = $this->logindb->query($statement);

	while ($row = $response->fetch_assoc())
	{
		echo "Checking if user $un is in database...\n";
		if ($row["username"] == $un)
		{
			echo "User $un is in the database.\n";
			echo "Checking password for $username ...".PHP_EOL;
			if ($row["password"] == $pw)
			{
				echo "Passwords match for $username .".PHP_EOL;
				echo "\n----DONE SEARCHING----\n\n";
				return 1;// password match
			}
			echo "Passwords did not match for $username".PHP_EOL;
			echo "\n----DONE SEARCHING----\n\n";
		}else{
			echo "The user $un is not in the database";
			echo "\n----DONE SEARCHING----\n\n";
		}	
	}
	return 0;//no users matched username
}
}
?>
