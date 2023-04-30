
<html>
    <link rel="stylesheet" href="movie.css">
  <body>



  <ul>
    <li><a class="active" href="movie.php">Movie</a></li>
    <li><a href="dining.html">Dining</a></li>
    <li><a href="profile.html">Profile</a></li>
    <li style="float:right"><a href="index.html">Logout</a></li>
  </ul>

<div class="container">
    <h1>Movie Rewards</h1>
    <form action="movie_reward.php" id="join-us">
      <div class="fields">
           <span>
           <input name="mrwn" placeholder="Reward Number" type="text" required />
            </span>
      <br />
            <span>

            <input list="mitems" name="mitem" placeholder="Item" required />
            <datalist id="mitems">
                <option value="Candy">
                <option value="Slushy">
                <option value="Popcorn">
                <option value="Movie Ticket">
            </datalist>

            </span>
      <br />
       <span>
        <input name="mquantity" placeholder="Quantity" type="number" min="1" required />
      </span>
      <br />
       <span>
         <input name="mdate" placeholder="Date" type="date" required />
      </span>
      </div>
      <br/> <br/>
      <div class="openButton">
        <button type="submit" class="btn" >Submit</button>
      </div>
    </form>
    

</div>
</body>
</html>