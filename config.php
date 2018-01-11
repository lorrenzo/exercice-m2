<?php

	define('DB_SERVER', 'localhost:3306'); // il faut définir le port
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME', 'OlfatiBank');

	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	// Check connection

	if($db === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

?>
