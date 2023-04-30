<?php
	$username = 'root';
	$password = '...';
   
	// Connect to MySQL server, select database
	$conn = new mysqli(localhost, $username, $password, $username);

   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
         

?>
