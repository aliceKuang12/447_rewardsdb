<?php
 include("db.php");

$fname = $_GET["fname"]; 
$lname = $_GET["lname"]; 
$cell = $_GET["cell"]; 
$rewardNum = $_GET["rewardNum"]; 
$sql = "INSERT INTO User (fname, lname, cell, rewardsNumber) VALUES ('$fname', '$lname', '$cell', '$rewardNum')";

$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo"Error: " . $sql . "<br>" . $conn->error;
}

header("Location: https://people.eecs.ku.edu/~a358k336/rewardsTracker/");

?>


