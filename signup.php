<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style3.css">
</head>

<body>

    <div class="container">

        <a href="index.html"><img src="pictures/logo.png" alt="Image is not supported."></a>

        <form action="#" method="POST" name="myform" onsubmit="return validateform()">
            <div class="title">
                <h1> Registration form </h1>
            </div>
            <br>

            <div class="form">
                <div class="inputfield">
                    <label for="username"><b>UserName</b></label>
                    <input type="text" placeholder="Enter username" name="username" id="fillin" required>
                </div>

                <div class="inputfield">
                    <label for="fname"><b>First Name</b></label>
                    <input type="text" placeholder="First Name" name="fname" id="fillin" required>
                </div>

                <div class="inputfield">
                    <label for="lname"><b>Last Name</b></label>
                    <input type="text" placeholder="Last Name" name="lname" id="fillin" required>
                </div>

                <div class="inputfield">
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" id="fillin" required>
                </div>

                <div class="inputfield">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        id="fillin" required>
                </div>

                <div class="inputfield">
                    <label for="psw-conf"><b>Confirm Password</b></label>
                    <input type="password" placeholder="Confirm Password" name="psw-conf" id="fillin" required>
                </div>

                <div class="inputfield">
                    <p><b>Designation</b></p>
                    <input type="radio" id="fac" name="designation" value="Faculty">
                    <label for="fac"><b>Faculty</b></label>

                    <input type="radio" id="stu" name="designation" value="Student">
                    <label for="stu"><b>Student</b></label>
                    <br>
                </div>

                <div class="inputfield">
                    <button type="submit" class="registerbtn" name="register"> Register </button>
                </div>
            </div>
            <p>Already have an account? <a href="login.php">Login</a>.</p>
    </div>



    <!-- <script type="text/javascript">
        var greeting = "Good Morning";
            if (new Date.getHours() > 12 && new Date.getHours() < 16) {
            greeting = "Good Afternoon";
            }
            else if(new Date.getHours() > 16){
                greeting = "Good Evening";
            }
            <?php $body = '<script type="text/javascript"> document.write(greeting); </script>'; ?>
            location.href = "test2.php?p1=" + greeting;
            
    </script> -->

    <!-- <script>
        function myFunction() {
            var psw = document.getElementsByName("psw")[0].value;
            var psw_conf = document.getElementsByName("psw-conf")[0].value;
        

        if (psw != psw_conf) {
            alert("Password and Confirmed Password fields do not match.");
            return false;
  }
    
}
    </script> -->

</body>

</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mysqli = new mysqli($servername, $username, $psd, $dbname);
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $psd = $_POST['psw'];
        $cpsd = $_POST['psw-conf'];
        $designation = $_POST['designation'];

    //         echo '<script>
//         function myFunction() {
//             var psw = document.getElementsByName("psw")[0].value;
//             var psw_conf = document.getElementsByName("psw-conf")[0].value;


    //         if (psw != psw_conf) {
//             alert("Password and Confirmed Password fields do not match.");
//             //window.location.reload();  
//   }

    // }
//     </script>';

    $sql_u = "SELECT * FROM users WHERE username='$username'";
    //echo $username;
    $res_u = mysqli_query($conn, $sql_u);


    echo '<div class="my_class">';
    //echo mysqli_num_rows($res_u);
    $foo_1 = true;
    if (mysqli_num_rows($res_u) > 0) {
        echo "<script>alert('Username already exists.');
            
            </script>";
        $foo_1 = false;
    }


    //echo "$username "," ", "$fname "," ","$lname"," ","$email"," ","$psd"," ","$cpsd"," ","$designation";
    //echo "<br>";
    //echo $query;

    $foo = true;

    if ($psd != $cpsd && $foo_1 == true) {
        echo '<script type = text/javascript>
        alert("Password and Confirmed Password fields do not match.");
    </script>';
        $foo = false;
        $data = true;
    } 
    else {
        $query = "INSERT INTO users (username,firstname,lastname,email,passwrd,cpassword,designation) 
        VALUES('$username','$fname','$lname','$email','$psd','$cpsd','$designation')";
        $data = mysqli_query($conn, $query);
    }





    if ($data && $foo) {


        echo "Data has been inserted to database.";
        
        $mail = new PHPMailer(true);
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server (Gmail)
        $mail->SMTPAuth = true;         // Enable SMTP authentication
        $mail->Username = 'b21312@students.iitmandi.ac.in'; // Your Gmail username
        $mail->Password = 'mqsv awai nalc gabq'; // App password generated from Google account
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        $receiver = $email;
        
        $mail->setFrom('b21312@students.iitmandi.ac.in', 'Prakul');
        $mail->addAddress( $receiver,$fname);
        // $mail->isHTML(true);
        $mail->Subject = "Registration Successful @IITMandi Conference Room portal";
        $mail->Body = 
        "Hi " . $fname . " " . $lname . ".\n\n" .
        "Greetings of the day.\n" .
        "Thanks a lot for registering on our booking platform.\n\n" .
        "Following is your username and registration email.\n\n" .
        "# Username - " . $username . "\n" .
        "# Email - " . $email . "\n\n" .
        "We advise you not to share your password or login details with anyone.\n\n" .
        "Thanks and Regards,\n" .
        "Prakul";

        echo '<div class="my_class">';
        if ($mail->send()) {
            echo "Email sent successfully to $receiver";
        } 
        else {
            echo "Sorry, failed while sending mail!" . error_get_last();
        }
        echo '</div>';

        
        $sql_query = "SELECT * FROM users where username = '$username'";
        $result = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_array($result);
        $firstname = $row['firstname'];
        $designation = $row['designation'];
        echo "<script>
                window.location.href = 'http://conferenceroom-b3ddc4hvbnaze7gf.centralindia-01.azurewebsites.net/date.php?firstname=" . urlencode($firstname) . "&designation=" . urlencode($designation) . "&username=" . urlencode($username) . "';
        </script>";

    } 

    else {
        if ($foo == true) {
            echo "Insertion operation failed.<br> REASON - " . mysqli_error($conn);
            echo "<br>";
        } else {
            echo "Insertion operation failed.<br> REASON - Password mismatch.";
            echo "<br>";
        }

    }
    echo '</div>';


}
?>
