  <?php
include ("db.php");

$drwn = $_GET["drwn"];
$ditem = $_GET['ditem'];
$dq = $_GET['dquantity'];
$ddate = $_GET["ddate"];

$sql = "insert into DiningRwds(rwn, item,  quantity, rwdDate) VALUES ('$drwn', '$ditem', '$dq', '$ddate')";

if ($conn->query($sql) != TRUE) {
       echo"Error: " . $conn->error;
}

$sql2 = "UPDATE DiningRwds, ItemPoints SET rpoints= points*quantity 
WHERE points = (SELECT points FROM ItemPoints WHERE item = '$ditem') 
AND DiningRwds.item = '$ditem'";

if ($conn->query($sql2) == FALSE) {
       echo"<p>Error: ". $conn->error. "</p>";
}

 

?>
