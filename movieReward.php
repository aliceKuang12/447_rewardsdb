<?php


// include ("db.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


// get data from form
$rwn = $GLOBALS["rewardsNumber"];
$date = $_POST['date'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];

echo "<p>" . $rwn . $date . $_POST["item"] . $_POST["quantity"] . "</p>";

// $stmt = $conn->prepare("INSERT INTO `MovieRewards` (`date`, `rewardsNumber`, `item`, `quantity`) VALUES (?, ?, ?, ?)");
// $stmt->bind_param("sisi", $date, $rwn, $item, $quantity);

// if ($stmt->execute()) {
//       echo "<p>New record created successfully</p>";
// } else {
//      echo"Error: " . $stmt . "<br>" . $conn->error;
// }

// $stmt->close();


?>


