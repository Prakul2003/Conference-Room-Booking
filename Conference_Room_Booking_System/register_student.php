<?php include("connection.php");?>
<?php
$cars = array('time_slot_1', 'time_slot_2', 'time_slot_3','time_slot_4','time_slot_5');
$date = $_GET["date"];
$conf_room = $_GET['conf_room'];
//echo $date;

$time_slot_1 = $cars[0];
$sql_u = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_1'";
$res_u = mysqli_query($conn, $sql_u);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u) > 0){
    $time_slot_1 = '1';
}

$time_slot_2 = $cars[1];
$sql_u = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_2'";
$res_u = mysqli_query($conn, $sql_u);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u) > 0){
    $time_slot_2 = '1';
}

$time_slot_3 = $cars[2];
$sql_u = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_3'";
$res_u = mysqli_query($conn, $sql_u);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u) > 0){
    $time_slot_3 = '1';
}

$time_slot_4 = $cars[3];
$sql_u = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_4'";
$res_u = mysqli_query($conn, $sql_u);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u) > 0){
    $time_slot_4 = '1';
}

$time_slot_5 = $cars[4];
$sql_u = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_5'";
$res_u = mysqli_query($conn, $sql_u);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u) > 0){
    $time_slot_5 = '1';
}

    // if (mysqli_num_rows($res_u) > 0){
    //     echo '<script type="text/javascript">

    //     // alert("Hi main idhar hoon")

    //     </script>';
    // } ?>
        <!-- <script>
        var time = <?php echo $time_slot; ?>;
        alert("hi");
        document.write(time);
        document.getElementById(time).className = "invalid";
        </script>     -->
            
    
    
<?php
// echo $date;
// echo $conf_room;
    
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
    <div class="container1" >
        <a href = "https://www.google.com">
        <div class= "<?php if ( $time_slot_1 == "1" ) { echo "invalid"; } else { echo "container";} ?>" name = "time_slot_1">
            Time Slot 1 <br> 09:00 AM - 11:00 AM
            
        </div>
        </a>
        
        <div class= "<?php if ( $time_slot_2 == "1" ) { echo "invalid"; } else { echo "container";}?>" name = "time_slot_2">
            Time Slot 2 <br> 01:00 PM - 03:00 PM 
        </div>
        <div class= "<?php if ( $time_slot_3 == "1" ) { echo "invalid"; } else { echo "container";}?>" name = "time_slot_3">
            Time Slot 3 <br> 03:30 PM - 05:30 PM 
        </div>
    </div>

    <div class="container2">
        <div class= "<?php if ( $time_slot_4 == "1" ) { echo "invalid"; } else { echo "container";}?>" name = "time_slot_4">
            Time Slot 4 <br> 06:00 PM - 08:00 PM 
        </div>
        <div class= "<?php if ( $time_slot_5 == "1" ) { echo "invalid"; } else { echo "container";}?>" name = "time_slot_5">
            Time Slot 5 <br> 09:00 PM - 11:00 PM
        </div>
    </div>
    <div class="container3">
        <p>Key </p>
        <div class="red">Booked Slot(s)</div>
        <div class="blue">Available Slot(s)</div>
    </div>

</body>
</html>


    