<?php
  if (!isset($_GET['id'])) {
    echo "Movie not found";
    exit;
  }

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

  $movie_id = $_GET['id'];

  $sql = 
    "SELECT
      showtimes.id,
      showtimes.cinema_id,
      cinemas.name AS cinema_name,
      showtimes.showtime
    FROM
      showtimes
      JOIN cinemas
      ON showtimes.cinema_id=cinemas.id
    WHERE movie_id={$movie_id}
    ORDER BY cinema_id, showtime";

  $result = mysqli_query($conn, $sql);

  
  if (mysqli_num_rows($result) > 0) {
    echo "<div class='order-section'>";
    echo "  <h1 class='center'>";
    echo "    Showtimes";
    echo "  </h1>";
    echo "  <div class='width-wrap'>";
    echo "    <div class='showtimes'>";
    echo "    <div class='details border-left'>";
    echo "      <div class='header'>Select a timeslot</div>";
    $currentDate = NULL;
    $currentCinema = NULL;
    $currentDate = NULL;

    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $cinema_id = $row['cinema_id'];
      $cinema_name = $row['cinema_name'];
      
      $showObj = date_create($row['showtime']);
      $showdate = date_format($showObj, "l, d M");
      $showtime = date_format($showObj, "g:ia");
      
      if ($currentCinema != $cinema_name) {
        if ($currentCinema !== NULL) {
          echo "</div>";
        }
        echo "<div id='{$cinema_name}' class='padding'>";
        echo "<h2>".$cinema_name."</h2>";
        $currentCinema = $cinema_name;
        $currentDate = NULL;
      }

      if ($currentDate != $showdate) {
        echo "<h3>".$showdate."</h3>";
        $currentDate = $showdate;
      }

      echo "<div class='timeslot'>";
      // echo $id."<br />";
      // echo $cinema_id."<br />";
      // echo $cinema_name."<br />";
      echo $showtime;
      echo "</div>";
      $cinemas[] = $cinema_name;
    }
    echo "  </div>";
    echo "  </div>";

    echo "  <div class='cinemas poster'>";
    echo "    <div class='header'>Select a cinema</div>";
    foreach(array_unique($cinemas) as $cinema) {
      echo "  <div class='padding'>".$cinema."</div>";
    }
    echo "  </div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  } else {
    echo "Opps. Movie not found";
  }

  mysqli_close($conn);
?>