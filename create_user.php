<?php
 include("db.php");

$fname = $_GET["fname"]; 
$lname = $_GET["lname"]; 
$cell = $_GET["cell"]; 
$rwn = $_GET["rewardNum"]; 
$sql = "INSERT INTO User (fname, lname, cell, rwn) VALUES ('$fname', '$lname', '$cell', '$rwn')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo"Error: " . $sql . "<br>" . $conn->error;
}

// header("Location: https://people.eecs.ku.edu/~a358k336/rewards1/");

?>


