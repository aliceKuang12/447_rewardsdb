<?php

include ("index.html");
include ("db.php");

$mrwn = $_GET["mrwn"];
$mdate = $_GET["mdate"];
$mitem = $_GET['mitem'];
$mq = $_GET['mquantity'];

$sql = "INSERT INTO MovieRwds (rwn, item, quantity, rwdDate) VALUES ('$mrwn', '$mitem', '$mq', '$mdate')";
// $result = $conn->query($sql);

if ($conn->query($sql) == FALSE) {
       echo"<p>Error: ". $conn->error. "</p>";
}

$sql2 = "UPDATE MovieRwds, ItemPoints SET rpoints= points*quantity 
WHERE points = (SELECT points FROM ItemPoints WHERE item = '$mitem') 
AND MovieRwds.item = '$mitem'";

if ($conn->query($sql2) == FALSE) {
       echo"<p>Error: ". $conn->error. "</p>";
}

// $stmt = $conn->prepare(");
// $stmt->bind_param("sisi", $date, $GLOBALS["rwn"], $item, $quantity);

// if ($stmt->execute()) {
//        echo "<p>New record created successfully</p>";
//  } else {
//       echo"Error: " . $stmt . "<br>" . $conn->error;
//  }

//  $stmt->close();

// header("Location: https://people.eecs.ku.edu/~a358k336/rewards1/");

?>


