<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="common.css">
  <link rel="stylesheet" type="text/css" href="confirm.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,700" rel="stylesheet">
  <title>PICTURE HOUSE</title>
</head>

<body>
  <?php include 'nav.php'; ?>

  <div class="content center">
    <?php include 'confirm_ticket.php'; ?>

		<!-- <h1>BOOKING CONFIRMED</h1>
		The booking details have been sent to your email address.
			<div class='ticket'>
			<div class='title'>
        Mission: Impossible - Fallout
			</div>
			<div class='details'>
        Tuesday, 23 Oct 18
				<br/>
				1:00PM
				<br/>
				NEX
				<br/>
				Seats: A4
			</div>
			<div class='paid'>
				Amount paid: $22.00
			</div>
		</div> -->

  </div>

  <div id="footer"></div>

  <script>
    $(document).ready(function () {
        $('#footer').load('footer.html');
    });
  </script>
</body>

</html>