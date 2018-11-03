<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="common.css">
  <link rel="stylesheet" type="text/css" href="confirm.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,700" rel="stylesheet">
  <title>Booking</title>
</head>

<body>
  <?php include 'nav.php'; ?>

  <div class="content center">
    <?php include 'confirm_ticket.php'; ?>
  </div>

  <div id="footer"></div>

  <script>
    $(document).ready(function () {
        $('#footer').load('footer.html');
    });
  </script>
</body>

</html>