<?php
  $servername = "localhost";
  $username = "f31im";
  $password = "f31im";
  $dbname = "f31im";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }

  if (!isset($_GET['id'])) {
    echo "Movie not found";
    exit;
  }

  $sql = "SELECT * FROM movies WHERE id=".$_GET['id'];
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $name = $row['title'];
    $releaseDate = $row['releaseDate'];
    $cast = $row['cast'];
    $director = $row['director'];
    $description = $row['description'];
    $genre = $row['genre'];
    $language = $row['language'];
    $stars = $row['stars'];
    $rating = $row['rating'];
    $runtime = $row['runtime'];
    $poster = $row['poster'];
    
    echo "<div class='movie-section'>";
    echo "  <div class='width-wrap'>";
    echo "    <img class='poster' src='posters/".$poster."'>";
    echo "    <div class='details padding'>";
    // echo $id."<br />";
    echo "<h1>".$name."</h1>";
    echo $releaseDate."<br />";
    echo $cast."<br />";
    echo $director."<br />";
    echo "<br />";
    echo $description."<br />";
    echo $genre."<br />";
    echo $language."<br />";
    echo $stars." stars<br />";
    echo $rating."<br />";
    echo $runtime."mins<br />";
    echo "    </div>";
    echo "  </div>";
    echo "</div>";
  } else {
    echo "Opps. Movie not found";
  }

  mysqli_close($conn);
?>