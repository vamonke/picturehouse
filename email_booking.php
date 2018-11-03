<?php
// $email = 'valishru@hotmail.com';
// $title = 'Halloween';
// $showdate = '5 Nov';
// $showtime = '1.00pm';
// $cinema = 'NEX';
// $seats = 'A1, A2';
// $total_price = '$20';

echo $email;
echo $title;
echo $showdate;
echo $showtime;
echo $cinema_name;
echo $seats;
echo $total_price;

// Get name
$sql = 'SELECT name FROM users WHERE email = \''.$email.'\'';
// echo $sql;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    // echo $name;
} else {
    $name = 'customer';
}

$to      = 'f31im@localhost';
$subject = 'Booking confirmed!';
$message =

"Hi ".$name.",

Your booking has been confirmed.

Movie: \t".$title."
Date: \t".$showdate."
Time: \t".$showtime."
Cinema: ".$cinema."
Seats: \t".$seats."

Total paid: ".$total_price."

- PICTURE HOUSE";

$headers = 'From: f31im@localhost' . "\r\n" .
    'Reply-To: f31im@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, $message, $headers,'-ff31im@localhost');
?> 