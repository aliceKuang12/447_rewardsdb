<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=PT+Sans:400,400italic);

    @import url(https://fonts.googleapis.com/css?family=Droid+Serif);

    html,
    body {
      background: #2F1E27;
    }

    h1,
    p {
      text-align: left;
      color: white;
      font-family: "Pt Sans", helvetica, sans-serif;
    }

    h6 {
      color: white;
      font-family: "Pt Sans", helvetica, sans-serif;
    }

    body {
      counter-reset: section;
      text-align: center;
    }

    .container {
      position: relative;
      top: 100px;
    }

    .container h1,
    .container span {
      font-family: "Pt Sans", helvetica, sans-serif;
    }

    .container h1 {
      text-align: center;
      color: #fff;
      font-weight: 100;
      font-size: 2em;
      margin-bottom: 10px;
    }

    .container h2 {
      font-family: "droid serif";
      font-style: italic;
      color: #d3b6ca;
      text-align: center;
      font-size: 1.2em;
    }

    .container form span:before {
      counter-increment: section;
      content: counter(section);
      border: 2px solid #4c2639;
      width: 40px;
      height: 40px;
      color: #fff;
      display: inline-block;
      border-radius: 50%;
      line-height: 1.6em;
      font-size: 1.5em;
      position: relative;
      left: -22px;
      top: -11px;
      background: #2F1E27;
    }

    form {
      margin-top: 25px;
      display: inline-block;
    }

    .fields {
      border-left: 2px solid #4c2639
    }

    .container span {
      margin-bottom: 22px;
      display: inline-block;
    }

    .container span:last-child {
      margin-bottom: -11px;
    }

    input {
      border: none;
      outline: none;
      display: inline-block;
      height: 34px;
      vertical-align: middle;
      position: relative;
      bottom: 14px;
      right: 9px;
      border-radius: 22px;
      width: 220px;
      box-sizing: border-box;
      padding: 0 18px;
    }

    input[type="button"],
    input[type="submit"] {
      background: rgba(197, 62, 126, .33) ! important;
      color: #fff;
      position: relative;
      left: 9px;
      top: 25px;
      width: 100px;
      cursor: pointer;
    }

    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
  </style>
</head>

<?php
include("db.php");
$cell = $_GET["cell"];
$sql = "SELECT * FROM User where cell = '$cell'";

$result = $conn->query($sql);
$GLOBALS["userProfile"] = $result;
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<h1>Welcome " . $row["fname"] . " " . $row["lname"] . "\n</h1>";
    echo "<p>Rewards Number: " . $row["rewardsNumber"] . "\n</p>";
    $GLOBALS['rewardsNumber'] = $row["rewardsNumber"];
  }
  $rwn = $GLOBALS['rewardsNumber'];
  $sql2 = "SELECT * FROM MovieRewards  where rewardsNumber ='$rwn'";
  $result2 = $conn->query($sql2);

  $sql3 = "SELECT * FROM DiningRewards  where rewardsNumber ='$rwn'";
  $result3 = $conn->query($sql3);
}
?>

<body>
  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Movie')" id="defaultOpen">Movie</button>
    <button class="tablinks" onclick="openCity(event, 'Dining')">Dining</button>
    <button class="tablinks" onclick="openCity(event, 'Rewards')">Rewards</button>
  </div>


  <!-- Tab1 : Movie -->
  <div id="Movie" id="default-open" class="tabcontent">
  <a href="movie.html" target="_blank">Enter purchase fields</a>   
        <form action="./movieReward.php" method="get">
          <p>Enter movie rewards</p>
          <p>Date: </p><input name="date" type="date" placeholder="YYYY-MM-DD" min="2023-01-01" max="2023-12-31">
          <p>Item:</p><input name="item" type="text">
          <p>Quantity:</p><input name="quantity" type="text">
          <p> </p>
          <input type="submit" value="Add Reward ">
        </form>

    <br /> <br />

    <?php
    echo "<h1>Rewards History</h1>";

    if ($result2->num_rows > 0) {
      echo "
    
    <table class='movieRewards'>
    <tr>
        <th>Date</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Points</th>
    </tr>
      ";
      while ($row = $result2->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["item"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["myPoints"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<p> No rewards yet! </p>";
    }

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


  <!-- Tab2: Dining -->

  <div id="Dining" class="tabcontent">

    <form action="" method="post">
      <p>Enter movie rewards</p>
      <p>Date: </p><input name="date" type="text" placeholder="YYYY-MM-DD" min="2023-01-01">
      <p>Item:</p><input name="item" type="text">
      <p>Quantity:</p><input name="quantity" type="text">
      <p> </p>
      <input type="submit" value="Add Reward">
    </form>

    <br /> <br />

    <!-- <?php
    echo "<h1>Rewards History</h1>";

    if ($result2->num_rows > 0) {
      echo "
    
    <table class='movieRewards'>
    <tr>
      <th>Date</th>
      <th>Item</th>
      <th>Quantity</th>
      <th>Points</th>
    </tr>
  ";
      // while($row = $result2->fetch_assoc()) {
    
      //     echo "<tr>";
      //     echo "<td>"  . $row["date"]      . "</td>";
      //     echo "<td>"  . $row["item"]  . "</td>";
      //     echo "<td>" . $row["quantity"] . "</td>";
      //     echo "<td>"  . $row["myPoints"]     . "</td>";
      //     echo "</tr>";
      // }
    } else {
      echo "<p> No rewards yet! </p>";
    }

    ?>
-->
  </div>


  <div id="Rewards" class="tabcontent">

    <h3>Total Points</h3>

    <h3>Movie Rewards</h3>

    <?php

    if ($result2->num_rows > 0) {
      echo "
    
    <table class='movieRewards'>
    <tr>
      <th>Date</th>
      <th>Item</th>
      <th>Quantity</th>
      <th>Points</th>
    </tr>
  ";
      while ($row = $result2->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["item"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["myPoints"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<p> No rewards yet! </p>";
    }

    ?>

    <h3>Dining Rewards</h3>
    <?php
    echo "hi";
    if ($result) {
      echo "hi";
      while ($row = $GLOBALS["userProfile"]->fetch_assoc()) {
        echo "Name: " . $row["fname"] . $row["lname"] . "\n";
        echo "Phone: " . $row["cell"] . "\n";
        echo "Rwn: " . $row["rewardsNumber"] . "\n";
      }
    } else {
      echo "<p> No rewards yet! </p>";
    }

    $conn->close();
    ?>
  </div>



  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>


</body>

</html>