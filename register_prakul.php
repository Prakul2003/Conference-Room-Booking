<?php include("connection.php");?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$cars = array('time_slot_1', 'time_slot_2', 'time_slot_3', 'time_slot_4', 'time_slot_5');
$date = $_GET["date"];
$conf_room = $_GET['conf_room'];
$user = $_GET['username'];
$designation = $_GET['designation'];

foreach ($cars as $slot) {
    $sql_u = "SELECT * FROM reservations WHERE datee = '$date' AND conf_room = '$conf_room' AND time_slot = '$slot'";
    $res_u = mysqli_query($conn, $sql_u);

    if (mysqli_num_rows($res_u) > 0) {
        ${$slot} = '1'; // Dynamically setting variable based on slot availability
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Slot</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>
    <div class="container0">
        <h1>Choose your Time Slot</h1>
    </div>

    <div class="container1">
        <?php foreach ($cars as $index => $slot): ?>
            <button id="<?= $slot ?>" class="<?= ${$slot} == '1' ? 'invalid' : 'container' ?>" onclick="<?= ${$slot} == '1' ? 'nothing()' : 'myFunction()' ?>">
                Time Slot <?= $index + 1 ?> <br> 
                <?php if ($index == 0) echo "09:00 AM - 11:00 AM"; ?>
                <?php if ($index == 1) echo "01:00 PM - 03:00 PM"; ?>
                <?php if ($index == 2) echo "03:30 PM - 05:50 PM"; ?>
                <?php if ($index == 3) echo "06:00 PM - 08:00 PM"; ?>
                <?php if ($index == 4) echo "09:00 PM - 11:00 PM"; ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="container3">
        <p>Key</p>
        <div class="red">Booked Slot(s)</div>
        <div class="blue">Available Slot(s)</div>
    </div>

    <div class="hidden">
        <div id='date'><?= $date ?></div>
        <div id='conf_room'><?= $conf_room ?></div>
        <div id='username'><?= $user ?></div>
        <div id='designation'><?= $designation ?></div>
    </div>

    <script type="text/javascript" src="register_prakul.js"></script>
</body>

<?php
if (isset($_GET["p1"]) && isset($_GET["p2"]) && isset($_GET["p3"])) {
    $p1 = preg_replace("/\s+/", "", $_GET["p1"]);
    $p2 = preg_replace("/\s+/", "", $_GET["p2"]);
    $p3 = preg_replace("/\s+/", "", $_GET["p3"]);
    $user = preg_replace("/\s+/", "", $_GET["username"]);
    $designation = preg_replace("/\s+/", "", $_GET["designation"]);
    echo "<script>
    alert('$p1 $p2 $p3');
  </script>";
    $unik = "$p2$p3$p1";
    $query = "INSERT INTO reservations (reservation_id, username, conf_room, time_slot, datee, designation) 
              VALUES ('$unik', '$user', '$p3', '$p1', '$p2', '$designation')";
    
    // Debugging - check if the query executes successfully
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Record added succesfully');
              </script>";
    } else {
        // Output the MySQL error message
        echo "<script>
                alert('Record not added succesfully');
              </script>";
    }


    $firstname = getUserData($conn, 'firstname', $user);
    $lastname = getUserData($conn, 'lastname', $user);
    $email = getUserData($conn, 'email', $user);

    $timeSlotDisplay = formatTimeSlot($p1);
    
    // Send the booking email using PHPMailer
    sendBookingEmail($firstname, $lastname, $email, $p2, $p3, $timeSlotDisplay);
}
else{
    echo "<script>
                alert('Error receiving values');
              </script>";
}

function getUserData($conn, $field, $username) {
    $sql_query = "SELECT $field FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);
    return $row[$field];
}

function formatTimeSlot($slot) {
    switch ($slot) {
        case 'time_slot_1': return '09:00 AM - 11:00 AM';
        case 'time_slot_2': return '01:00 PM - 03:00 PM';
        case 'time_slot_3': return '03:30 PM - 05:50 PM';
        case 'time_slot_4': return '06:00 PM - 08:00 PM';
        case 'time_slot_5': return '09:00 PM - 11:00 PM';
        default: return '';
    }
}

function sendBookingEmail($firstname, $lastname, $email, $date, $room, $slot) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your SMTP server details
        $mail->SMTPAuth = true;
        $mail->Username = 'b21312@students.iitmandi.ac.in'; // SMTP username
        $mail->Password = 'mqsv awai nalc gabq'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('b21312@students.iitmandi.ac.in', 'Prakul');
        $mail->addAddress($email);

        //$mail->isHTML(true);
        $mail->Subject = "Booking Successful @IIT Mandi Conference Room Portal";
        $mail->Body = "
            Hi $firstname $lastname,<br><br>
            Thanks for using our services.<br><br>
            <strong>Booking Details:</strong><br>
            <ul>
                <li>Date: $date</li>
                <li>Conference Room: $room</li>
                <li>Time Slot: $slot</li>
            </ul>
            <br>
            Have a great day ahead!<br>
            For any queries, contact us at contactCRBPortal@gmail.com.
        ";

        $mail->send();
        echo "Email sent successfully to $email";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
</html>
