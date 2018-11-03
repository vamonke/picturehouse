<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="common.css">
  <link rel="stylesheet" type="text/css" href="browse.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,700" rel="stylesheet">
  <title>PICTURE HOUSE</title>
</head>

<body>
  <?php include 'nav.php'; ?>
  
  <div class='content'>
    <div class='background'></div>
    <div class='width-wrap'>
      <h1>BROWSE MOVIES</h1>
      <div class='movieContainer'>
        <?php include 'browse_table.php'; ?>
      </div>
    </div>
  </div>

  <div id="footer"></div>

  <script>
    $(document).ready(function () {  
        $('#footer').load('footer.html');
    });
  </script>
</body>

</html>