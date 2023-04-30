<?php
 include("db.php");

$fname = $_GET["fname"]; 
$lname = $_GET["lname"]; 
$cell = $_GET["cell"]; 
$rwn = $_GET["rwn"]; 
$sql = "UPDATE User SET fname='$fname', lname='$lname', cell='$cell' WHERE rwn = '$rwn'";

$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("Location: https://myrewardstracker.000webhostapp.com/");
    
} else {
    echo"Error: " . $sql . "<br>" . $conn->error;
}

// header("Location: https://people.eecs.ku.edu/~a358k336/rewards1/");

?>

