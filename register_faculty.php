<?php include("connection.php");?>
<?php
$cars = array('time_slot_1', 'time_slot_2', 'time_slot_3','time_slot_4','time_slot_5');
$date = $_GET["date"];
$conf_room = $_GET['conf_room'];
$user = $_GET['username'];
$designation = $_GET['designation'];
// echo $designation;
// echo $username;

$time_slot_1 = $cars[0];
$sql_u_fac = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_1' AND designation = 'Faculty'";
$sql_u_stu = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_1' AND designation = 'Student'";
$res_u_fac = mysqli_query($conn, $sql_u_fac);
$res_u_stu = mysqli_query($conn, $sql_u_stu);

if (mysqli_num_rows($res_u_fac) > 0){
    $time_slot_1 = '1';
}
else if (mysqli_num_rows($res_u_stu) > 0){
    $time_slot_1 = '2';
}

$time_slot_2 = $cars[1];
$sql_u_fac = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_2' AND designation = 'Faculty'";
$sql_u_stu = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_2' AND designation = 'Student'";
$res_u_fac = mysqli_query($conn, $sql_u_fac);
$res_u_stu = mysqli_query($conn, $sql_u_stu);

if (mysqli_num_rows($res_u_fac) > 0){
    $time_slot_2 = '1';
}
else if (mysqli_num_rows($res_u_stu) > 0){
    $time_slot_2 = '2';
}


$time_slot_3 = $cars[2];
$sql_u_fac = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_3' AND designation = 'Faculty'";
$sql_u_stu = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_3' AND designation = 'Student'";
$res_u_fac = mysqli_query($conn, $sql_u_fac);
$res_u_stu = mysqli_query($conn, $sql_u_stu);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u_fac) > 0){
    $time_slot_3 = '1';
}
else if (mysqli_num_rows($res_u_stu) > 0){
    $time_slot_3 = '2';
}

$time_slot_4 = $cars[3];
$sql_u_fac = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_4' AND designation = 'Faculty'";
$sql_u_stu = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_4' AND designation = 'Student'";
$res_u_fac = mysqli_query($conn, $sql_u_fac);
$res_u_stu = mysqli_query($conn, $sql_u_stu);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u_fac) > 0){
    $time_slot_4 = '1';
}
else if (mysqli_num_rows($res_u_stu) > 0){
    $time_slot_4 = '2';
}

$time_slot_5 = $cars[4];
$sql_u_fac = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_5' AND designation = 'Faculty'";
$sql_u_stu = "SELECT * FROM reservations WHERE datee ='$date' AND conf_room = '$conf_room' AND time_slot = '$time_slot_5' AND designation = 'Student'";
$res_u_fac = mysqli_query($conn, $sql_u_fac);
$res_u_stu = mysqli_query($conn, $sql_u_stu);
//echo mysqli_num_rows($res_u);
if (mysqli_num_rows($res_u_fac) > 0){
    $time_slot_5 = '1';
}
else if (mysqli_num_rows($res_u_stu) > 0){
    $time_slot_5 = '2';
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
    <!-- //yahan se -->
    <div class="container1" >
        <button id="time_slot_1" class= "<?php if ( $time_slot_1 == "1" ) { echo "invalid"; } else if($time_slot_1 == "2") { echo "warn";} else { echo "container";} ?>" name = "time_slot_1" onclick="<?php if ( $time_slot_1 == "1" ) { echo "nothing()"; } else if($time_slot_1 == "2") { echo "return myFunction()";} else { echo "return myFunction()";} ?>">
            Time Slot 1 <br> 09:00 AM - 11:00 AM
        </button>
        <button id="time_slot_2" class= "<?php if ( $time_slot_2 == "1" ) { echo "invalid"; } else if($time_slot_2 == "2") { echo "warn";} else { echo "container";} ?>" name = "time_slot_2" onclick="<?php if ( $time_slot_2 == "1" ) { echo "nothing()"; } else if($time_slot_2 == "2") { echo "return myFunction()";} else { echo "return myFunction()";} ?>">
            Time Slot 2 <br> 01:00 PM - 03:00 PM 
    </button>
        <button id="time_slot_3" class= "<?php if ( $time_slot_3 == "1" ) { echo "invalid"; } else if($time_slot_3 == "2") { echo "warn";} else { echo "container";} ?>" name = "time_slot_3" onclick="<?php if ( $time_slot_3 == "1" ) { echo "nothing()"; } else if($time_slot_3 == "2") { echo "return myFunction()";} else { echo "return myFunction()";} ?>">
            Time Slot 3 <br> 03:30 PM - 05:50 PM 
    </button>
    </div>
    <!-- yahan tak -->
    <div class="container2">
    <button id="time_slot_4" class= "<?php if ( $time_slot_4 == "1" ) { echo "invalid"; } else if($time_slot_4 == "2") { echo "warn";} else { echo "container";} ?>" name = "time_slot_4" onclick="<?php if ( $time_slot_4 == "1" ) { echo "nothing()"; } else if($time_slot_4 == "2") { echo "return myFunction()";} else { echo "return myFunction()";} ?>">
            Time Slot 4 <br> 06:00 PM - 08:00 PM 
    </button>
    <button id="time_slot_5" class= "<?php if ( $time_slot_5 == "1" ) { echo "invalid"; } else if($time_slot_5 == "2") { echo "warn";} else { echo "container";} ?>" name = "time_slot_5" onclick="<?php if ( $time_slot_5 == "1" ) { echo "nothing()"; } else if($time_slot_5 == "2") { echo "return myFunction()";} else { echo "return myFunction()";} ?>">
            Time Slot 5 <br> 09:00 PM - 11:00 PM 
    </button>
    </div>

    <div class="container4">
        <p>Key </p>
        <div class="red">Booked Slot(s)</div>
        <div class="orange">Booked By Student</div>
        <div class="blue">Available Slot(s)</div>
    </div>
    <div class = "hidden">
    <div id='date'>
    <?php
        echo $date;
    ?>
    </div>


    <div id='conf_room'>
    <?php
        echo $conf_room;
    ?>
    </div>

    <div id='username'>
    <?php
        echo $user;
    ?>
    </div>

    <div id='designation'>
    <?php
        echo $designation;
    ?>
    </div>
    </div>
    <script type="text/javascript" src="register_faculty.js"></script>

</body>
<?php
if ((isset($_GET["p1"]) && isset($_GET["p2"])&& isset($_GET["p3"]))) {
 $p1 = $_GET["p1"];
 $p2 = $_GET["p2"];
 $p3 = $_GET["p3"];
 $user = $_GET["username"];
$designation = $_GET["designation"];
 $p1=preg_replace("/\s+/", "", $p1);
 $p2=preg_replace("/\s+/", "", $p2);
 $p3=preg_replace("/\s+/", "", $p3);
 $user=preg_replace("/\s+/", "", $user);
 $designation=preg_replace("/\s+/", "", $designation);
 //echo $p1;
 $unik = "$p2$p3$p1";
 $mysqli = new mysqli($servername, $username, $psd, $dbname, 3306);
 $sql_query_1_u = "SELECT username FROM reservations where reservation_id = '$unik'";
 $result_1_u = $mysqli -> query($sql_query_1_u);
 
 while($row_1=mysqli_fetch_array($result_1_u))
{
 $user_stu = $row_1['username'].'';
}


 $sql_query_1 = "SELECT firstname FROM users where username = '$user_stu'";

 $result_1 = $mysqli -> query($sql_query_1);

 while($row_1=mysqli_fetch_array($result_1))
{
 $firstname1 = $row_1['firstname'].'';
}

$sql_query_2 = "SELECT lastname FROM users where username = '$user_stu'";

 $result_2 = $mysqli -> query($sql_query_2);

 while($row_2=mysqli_fetch_array($result_2))
{
 $lastname1= $row_2['lastname'].'';
}
$sql_query_3 = "SELECT email FROM users where username = '$user_stu'";
 $result_3 = $mysqli -> query($sql_query_3);

 while($row_3=mysqli_fetch_array($result_3))
{
 $email1= $row_3['email'].'';
}
$query1 = "DELETE FROM reservations where reservation_id = '$unik'";
$data1 = mysqli_query($conn, $query1);
echo "ERROR: ".mysqli_error($conn);

if ($p1 == 'time_slot_1'){
    $p1 = '09:00 AM - 11:00 AM';
}
else if ($p1 == 'time_slot_2'){
    $p1 = '01:00 PM - 03:00 PM ';
}
else if ($p1 == 'time_slot_3'){
    $p1 = '03:30 PM - 05:50 PM ';
}
else if ($p1 == 'time_slot_4'){
    $p1 = '06:00 PM - 08:00 PM ';
}
else if ($p1 == 'time_slot_5'){
    $p1 = '09:00 PM - 11:00 PM ';
}


$receiver1 = $email1;
        $subject = "Booking Cancelled @IITMandi portal";
        $body =
            "Hi ${firstname1} ${lastname1}.

        This is to inform with regret that your booking on our platform has been cancelled due to request from a higher priority user. 

        Following were your confirmed booking details - 
        
         # Date for which room was booked - ${p2}
         # Conference Room Booked - ${p3}
         # Time slot booked - ${p1}

       We are very sorry for the inconvenience caused to you.
       For any further queries, please drop us a mail on contactG22@gmail.com.
        
Thanks
G22 Team "
            ;
        $sender = "From: b21327@students.iitmandi.ac.in";
       

echo '<div class="my_class">';
        if (mail($receiver1, $subject, $body, $sender)) {
            echo "Email sent successfully to $receiver1";
        } else {
            echo "Sorry, failed while sending mail!" . error_get_last();
        }
        echo '</div>';

        if ($p1 == '09:00 AM - 11:00 AM'){
            $p1 = 'time_slot_1';
        }
        else if ($p1 == '01:00 PM - 03:00 PM '){
            $p1 = 'time_slot_2';
        }
        else if ($p1 == '03:30 PM - 05:50 PM '){
            $p1 = 'time_slot_3';
        }
        else if ($p1 == '06:00 PM - 08:00 PM' ){
            $p1 = 'time_slot_4';
        }
        else if ($p1 == '09:00 PM - 11:00 PM '){
            $p1 = 'time_slot_5';
        }
        


 $query = "INSERT INTO reservations (reservation_id,username,conf_room,time_slot,datee,designation) 
        VALUES('$unik','$user','$p3','$p1','$p2','$designation')";
 $data = mysqli_query($conn, $query);
 $mysqli = new mysqli($servername, $username, $psd, $dbname, 3306);

 $sql_query_1 = "SELECT firstname FROM users where username = '$user'";

 $result_1 = $mysqli -> query($sql_query_1);

 while($row_1=mysqli_fetch_array($result_1))
{
 $firstname = $row_1['firstname'].'';
}

$sql_query_2 = "SELECT lastname FROM users where username = '$user'";

 $result_2 = $mysqli -> query($sql_query_2);

 while($row_2=mysqli_fetch_array($result_2))
{
 $lastname= $row_2['lastname'].'';
}
$sql_query_3 = "SELECT email FROM users where username = '$user'";
 $result_3 = $mysqli -> query($sql_query_3);

 while($row_3=mysqli_fetch_array($result_3))
{
 $email= $row_3['email'].'';
}
if ($p1 == 'time_slot_1'){
    $p1 = '09:00 AM - 11:00 AM';
}
else if ($p1 == 'time_slot_2'){
    $p1 = '01:00 PM - 03:00 PM ';
}
else if ($p1 == 'time_slot_3'){
    $p1 = '03:30 PM - 05:50 PM ';
}
else if ($p1 == 'time_slot_4'){
    $p1 = '06:00 PM - 08:00 PM ';
}
else if ($p1 == 'time_slot_5'){
    $p1 = '09:00 PM - 11:00 PM ';
}

 $receiver = $email;
        $subject = "Booking Successful @G22 portal";
        $body =
            "Hi ${firstname} ${lastname}.

        Thanks for using our services. 

        Following are your confirmed booking details - 
        
         # Date for which room is booked - ${p2}
         # Conference Room Booked - ${p3}
         # Time slot booked - ${p1}

       Have a great day ahead.
       For any further queries, please drop us a mail on b21312@students.iitmandi.ac.in.
        
Thanks
Prakul "
            ;
        $sender = "From: b21312@students.iitmandi.ac.in";
       

echo '<div class="my_class">';
        if (mail($receiver, $subject, $body, $sender)) {
            echo "Email sent successfully to $receiver";
        } else {
            echo "Sorry, failed while sending mail!" . error_get_last();
        }
        echo '</div>';

//     if ($p1 == '09:00 AM - 11:00 AM'){
//         $p1 = 'time_slot_1';
//     }
//     else if ($p1 == '01:00 PM - 03:00 PM '){
//         $p1 = 'time_slot_2';
//     }
//     else if ($p1 == '03:30 PM - 05:50 PM '){
//         $p1 = 'time_slot_3';
//     }
//     else if ($p1 == '06:00 PM - 08:00 PM' ){
//         $p1 = 'time_slot_4';
//     }
//     else if ($p1 == '09:00 PM - 11:00 PM '){
//         $p1 = 'time_slot_5';
//     }

//     $unik = "$p2$p3$p1";
//     $mysqli = new mysqli($servername, $username, $psd, $dbname, 3306);
//     $sql_query_1_u = "SELECT username FROM reservations where unique1 = '$unik'";
//     $result_1_u = $mysqli -> query($sql_query_1_u);
    
//     while($row_1=mysqli_fetch_array($result_1_u))
//    {
//     $user = $row_1['username'].'';
//    }


//     $sql_query_1 = "SELECT firstname FROM users where username = '$user'";
   
//     $result_1 = $mysqli -> query($sql_query_1);
   
//     while($row_1=mysqli_fetch_array($result_1))
//    {
//     $firstname1 = $row_1['firstname'].'';
//    }
   
//    $sql_query_2 = "SELECT lastname FROM users where username = '$user'";
   
//     $result_2 = $mysqli -> query($sql_query_2);
   
//     while($row_2=mysqli_fetch_array($result_2))
//    {
//     $lastname1= $row_2['lastname'].'';
//    }
//    $sql_query_3 = "SELECT email FROM users where username = '$user'";
//     $result_3 = $mysqli -> query($sql_query_3);
   
//     while($row_3=mysqli_fetch_array($result_3))
//    {
//     $email1= $row_3['email'].'';
//    }

//    if ($p1 == 'time_slot_1'){
//     $p1 = '09:00 AM - 11:00 AM';
// }
// else if ($p1 == 'time_slot_2'){
//     $p1 = '01:00 PM - 03:00 PM ';
// }
// else if ($p1 == 'time_slot_3'){
//     $p1 = '03:30 PM - 05:50 PM ';
// }
// else if ($p1 == 'time_slot_4'){
//     $p1 = '06:00 PM - 08:00 PM ';
// }
// else if ($p1 == 'time_slot_5'){
//     $p1 = '09:00 PM - 11:00 PM ';
// }
   
// // $query = "DELETE FROM reservations WHERE username = '$user'AND conf_room = '$p3' AND time_slot = '$p1'AND datee = '$p2' AND designation = 'Student'";
// // $data = mysqli_query($conn, $query);
// // echo "ERROR: ".mysqli_error($conn);
// if ($p1 == '09:00 AM - 11:00 AM'){
//     $p1 = 'time_slot_1';
// }
// else if ($p1 == '01:00 PM - 03:00 PM '){
//     $p1 = 'time_slot_2';
// }
// else if ($p1 == '03:30 PM - 05:50 PM '){
//     $p1 = 'time_slot_3';
// }
// else if ($p1 == '06:00 PM - 08:00 PM' ){
//     $p1 = 'time_slot_4';
// }
// else if ($p1 == '09:00 PM - 11:00 PM '){
//     $p1 = 'time_slot_5';
// }

// // $unik = "$p2$p3$p1";
// // $query1 = "DELETE FROM reservations where where unique1 = '$unik' AND designation = 'Student'";
// // $data1 = mysqli_query($conn, $query1);



}


?>
</html>


    