<?php
	$username = 'a358k336';
	$password = 'phiaWae4';
   
	// Connect to MySQL server, select database
	$conn = new mysqli('mysql.eecs.ku.edu', $username, $password, $username);

   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
         

?>
