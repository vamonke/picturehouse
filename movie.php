<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="common.css">
  <link rel="stylesheet" type="text/css" href="movie.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,700" rel="stylesheet">
  <title>PICTURE HOUSE</title>
</head>

<body>
  <div id="navbar"></div>

  <?php include 'movie_details.php'; ?>
  <?php include 'movie_showtimes.php'; ?>

  <div id="footer"></div>

  <script>
    $(document).ready(function () {
        $('#navbar').load('nav.html');        
        $('#footer').load('footer.html');
    });
  </script>

</body>
</html>