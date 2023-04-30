<?php
	$username = 'root';
	$password = '...';
   	$host = 'localhost';

	// Connect to MySQL server, select database
	$conn = new mysqli($host, $username, $password, $username);

   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
         

?>
