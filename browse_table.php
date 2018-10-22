movies_table.php

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

  $sql = "SELECT * FROM movies";
  $result = mysqli_query($conn, $sql);

  echo "<div>";

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['title'];
      // $releaseDate = $row['releaseDate'];
      // $cast = $row['cast'];
      // $director = $row['director'];
      // $description = $row['description'];
      $genre = $row['genre'];
      $language = $row['language'];
      $stars = $row['stars'];
      $rating = $row['rating'];
      $runtime = $row['runtime'];
      $poster = $row['poster'];
      
      echo "<a href='movie.php?id=".$id."' class='movieCell' style='background-image: url(posters/".$poster.")'>";
      echo "  <div class='details'>";
      echo $id;
      echo "<div class='title'>".$name."</div>";
      // echo $releaseDate."<br />";
      // echo $cast."<br />";
      // echo $director."<br />";
      // echo $description."<br />";
      echo $genre." | ";
      echo $language." | ";
      echo $stars." stars | ";
      echo $rating." | ";
      echo $runtime."mins";
      echo "<br /><br />Book tickets";
      echo "  </div>";
      echo "</a>";

    }
    echo "</div>";
  } else {
    echo "No products currently";
  }

  mysqli_close($conn);
?>

</table>