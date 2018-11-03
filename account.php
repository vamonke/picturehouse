<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="common.css">
  <link rel="stylesheet" type="text/css" href="account.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,700" rel="stylesheet">
  <title>PICTURE HOUSE</title>
</head>

<body>
  <?php include 'nav.php'; ?>

  <div class="content">
    <div class='width-wrap'>
      <?php
        if (!isset($_SESSION['user_email'])) {
          header("Location: index.php");
          exit;
        }
        include "db_connect.php";
        $alpha = array(NULL, 'A','B','C','D','E');
        $email = $_SESSION['user_email'];
        consoleLog($email);
        
        $sql = 'SELECT name FROM users WHERE email = "'.$email.'"';
        // consoleLog($sql);
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) !== 1) echo "Error ocurred.";

        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        echo "<h1>{$name}</h1>";
        echo $email;

        echo "<button id='logout'>Log out</button>";
        
        echo "<h2>History</h2>";

        $sql =
          "SELECT
            movies.title,
            movies.id AS movie_id,
            movies.poster,
			      DATE_FORMAT(showtimes.showtime, '%W') AS showday,
			      DATE_FORMAT(showtimes.showtime, '%e %b %y') AS showdate,
			      DATE_FORMAT(showtimes.showtime, '%l:%i%p') AS showtime,
            cinemas.name AS cinema_name,
            bookings.total_price,
            GROUP_CONCAT(CONCAT(reserved_seats.row_no, reserved_seats.seat_no)) AS seats
          FROM
            reserved_seats
            INNER JOIN
              bookings ON reserved_seats.booking_id = bookings.id
            INNER JOIN
              showtimes ON showtimes.id = bookings.showtime_id
            INNER JOIN
              cinemas ON showtimes.cinema_id = cinemas.id
            INNER JOIN
              movies ON movies.id = showtimes.movie_id
            INNER JOIN
              users ON bookings.email = users.email
          WHERE users.email = '$email'
          GROUP BY bookings.id";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $movie_id = $row['movie_id'];
            $poster = $row['poster'];
            $showtime = $row['showtime'];
            $showday = $row['showday'];
            $showdate = $row['showdate'];
            $cinema_name = $row['cinema_name'];
            $total_price = $row['total_price'];
            $seats = $row['seats'];

            echo "<div class='poster' style='background-image: url(posters/$poster)'>";
            echo "  <div class='ticket'>";
            echo "    <a href='movie.php?id=$movie_id'><h1 class='title'>$title</h1><a/><br/>";
            echo "    <div class='floatRight'>";
            echo        $showdate."<br/>";
            echo        $showday."<br/>";
            echo        $showtime;
            echo "    </div>";
            echo "    Cinema: $cinema_name <br/>";
            echo "    Seats: ";

            $seatsArray = explode(',', $seats);
            $seatsAlpha = array();
            foreach ($seatsArray as $seat) {
              // echo $seat;
              $seatsAlpha[] = $alpha[$seat[0]].$seat[1];
            }
            echo implode(", ", $seatsAlpha);

            echo "     <br/> Total paid: \$$total_price";
            echo "  </div>";
            echo "</div>";
          }
        } else {
          echo "<div class='center'>You do not have any bookings.</div>";
        }
      ?>
    </div>
  </div>

  <div id="footer"></div>

  <script>
    $(document).ready(function () {
      $('#footer').load('footer.html');
      $('#logout').click(function() {
        $.ajax({
          url: 'logout.php',
          type: 'GET',
          success: function() { window.location.href = "index.php"; }
        });
      });
    });
  </script>
</body>

</html>