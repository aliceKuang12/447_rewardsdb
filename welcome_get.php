<?php
session_start(); 
include("db.php");  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<style>
  .button1{
  background: rgba(197, 62, 126, .33) ! important;
  color:#fff;
  border: none;
  outline:none;
  padding: 16px 32px;
  text-align: center;
  display: inline-block;  
  font-size: 16px;
  margin: 4px 2px;
  border-radius:22px;
  cursor:pointer;
  }

    h1, p {
        color: #FFF;
       /* text-align: left; */
    }
    
    h3, .pts, .h3descript{
        color: #FFF;
       text-align: left; 
    }
    
    table {
  border-collapse: collapse;
  border-spacing: 0;
        border: 1px solid white;
    }
    
    th, td {
  /*text-align: left;*/
  color: #FFF;
  padding: 10px;
}

.row::after {  
  content: "";
  clear: both;
  display: table;
}
/* Create two equal columns that floats next to each other , float: left;*/
.column {
  
  flex: 50%;
  padding: 20px; 
}

.h3 {
    
    text-align: left;
}
</style>
<head>
     <link rel="stylesheet" href="movie.css">
</head>

<?php
$cell = $_GET["cell"];
$sql = "SELECT * FROM User where cell = '$cell'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<h3/><h3/><br/><h1>Welcome " . $row["fname"] . " " . $row["lname"] . "\n</h1>";
    echo "<p>Rewards Number: " . $row["rwn"] . "\n</p>";
    // $GLOBALS['rwn'] = $row["rwn"];
    $_SESSION["srwn"] = $row['rwn'];
  }
  
  $rwn = $_SESSION['srwn'];
  $sql2 = "SELECT * FROM MovieRwds NATURAL JOIN ItemPoints WHERE rwn ='$rwn'";
  $result2 = $conn->query($sql2);
  
  $sql3 = "SELECT * FROM DiningRwds NATURAL JOIN ItemPoints WHERE rwn ='$rwn'";
  $result3 = $conn->query($sql3);
  
  $sql4 = "SELECT SUM(rpoints) FROM MovieRwds WHERE rwn ='$rwn'";
  $result4 = $conn->query($sql4);
  
  $sql5 = "SELECT SUM(rpoints) FROM DiningRwds WHERE rwn ='$rwn'";
  $result5 = $conn->query($sql5);
  
  $sql6 = "SELECT rwn, count(rwn) as purchases, sum(rpoints) as totalPoints
            FROM User NATURAL JOIN (SELECT * FROM MovieRwds UNION SELECT * FROM DiningRwds) as Rwds 
            GROUP BY(rwn) ORDER BY sum(rpoints) DESC
  ";
  $result6 = $conn->query($sql6);
}
?>

<body>
    <a href="https://myrewardstracker.000webhostapp.com/movie.php" target="_self">
        <button class = "button1" > Homepage  </button>
    </a>
    &nbsp;&nbsp;
        <a href="https://myrewardstracker.000webhostapp.com" target="_self">
        <button class = "button1" >&nbsp; Logout &nbsp; </button>
    </a>
  <div id="Movie" id="default-open" class="tabcontent">  


    <br /> <br />

    <?php
    echo "    <div class = \"row\"> <h1>Rewards History</h1> </div>";

    // movie Rewards
    if ($result2->num_rows > 0) {
    echo "
    <div class = \"row\">
    <div class =\"column\">
    <table class='movieRewards'>
    <h3 > Movie 
    ";
    
    while ($row = $result4->fetch_assoc()) {
        echo "&nbsp;  | &nbsp; Total points: " . $row["SUM(rpoints)"] . "</h3>";
    }
    echo "
    <tr>
        <th>Date</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Points / Item</th>
        <th>Points</th>
    </tr>
      ";
      while ($row = $result2->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . rtrim($row["rwdDate"], " 00:00:00") . "&nbsp;</td>";
        echo "<td>" . $row["item"] . "&nbsp;</td>";
        echo "<td>" . $row["quantity"] . "&nbsp;</td>";
        echo "<td>" . $row["points"] . "&nbsp;</td>";
        echo "<td>" . $row["rpoints"] . "&nbsp;</td>";
        echo "</tr>";
      }
      echo "</table> </div>";
      
    } else {
      echo "
      <div class = \"column\">
      <br/><br/><p> No movie rewards yet! </p><br/><br/>
      </div>
      ";
    }

    // Dining Rewards
    if ($result3->num_rows > 0) {
        
    echo "
    <div class = \"column\">
    <table class='DiningRewards'>
    <br/>
    <h3> Dining
    ";
    
    while ($row = $result5->fetch_assoc()) {
        echo "&nbsp;  | &nbsp; Total points: " . $row["SUM(rpoints)"] . "</h3>";
    }
    echo "
    <tr>
        <th>Date</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Points / Item</th>
        <th>Points</th>
    </tr>
      ";
      while ($row = $result3->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . rtrim($row["rwdDate"], " 00:00:00") . "&nbsp;</td>";
        echo "<td>" . $row["item"] . "&nbsp;</td>";
        echo "<td>" . $row["quantity"] . "&nbsp;</td>";
        echo "<td>" . $row["points"] . "&nbsp;</td>";
        echo "<td>" . $row["rpoints"] . "&nbsp;</td>";
        echo "</tr>";
      }
    echo "</table> </div>";
    echo "</div>";
      
    } else {
      echo "
            <div class = \"column\">
      <p > No dining rewards yet! </p>
      </div>";
    }
    
    // stats section: compare your total stats to other users  of the app. 
    echo "
    <div class=\"row\">
    <div class=\"column\">
    <h3>Current Rankings</h3>
    <p class=\"pts\">Current reward statuses of all users</p>
    <br/>
    <table>
    <tr>
        <th>Rwn</th>
        <th>Purchases</th>
        <th>Points</th>
    </tr>
    ";
    while ($row = $result6->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["rwn"] . "&nbsp;</td>";
        echo "<td>" . $row["purchases"] . "&nbsp;</td>";
        echo "<td>" . $row["totalPoints"] . "&nbsp;</td>";
        echo "<tr>";
    }
    
    echo "</table>
         </div>
         </div>
    ";
    ?>
  <script>
    function openForm() {
      document.getElementById("popupForm").style.display = "block";
    }
    function closeForm() {
      document.getElementById("popupForm").style.display = "none";
    }
  </script>

  </div>










<?php 
    $conn->close();    
?>

</body>

</html>

