<?php include("connection.php"); ?>

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

    <script>
        function validateform() {
            var psw = document.getElementsByName("psw")[0].value;
            var psw_conf = document.getElementsByName("psw-conf")[0].value;

            if (psw != psw_conf) {
                alert("Password and Confirmed Password fields do not match.");
                return false;
            }
        }
    </script>

</body>

</html>

<?php
// Database connection
$mysqli = new mysqli($servername, $username, $psd, $dbname, 3306);

// Handle form submission
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $psd = $_POST['psw'];
    $cpsd = $_POST['psw-conf'];
    $designation = $_POST['designation'];

    // Check if the username already exists
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $res_u = mysqli_query($mysqli, $sql_u);

    if (mysqli_num_rows($res_u) > 0) {
        echo "<script>alert('Username already exists.');</script>";
    } elseif ($psd != $cpsd) {
        echo "<script>alert('Password and Confirm Password fields do not match.');</script>";
    } else {
        // Insert data into the users table
        $query = "INSERT INTO users (username, firstname, lastname, email, passwrd, designation) 
                  VALUES('$username', '$fname', '$lname', '$email', '$psd', '$designation')";
        $data = mysqli_query($mysqli, $query);

        if ($data) {
            // Send email
            $receiver = $email;
            $subject = "Registration Successful @G22 portal";
            $body = "Hi ${fname} ${lname}. Greetings of the day. 
                     Thanks for registering on our platform. 
                     Your username is ${username} and email is ${email}.";
            $sender = "From: b21327@students.iitmandi.ac.in";

            if (mail($receiver, $subject, $body, $sender)) {
                echo "Email sent successfully to $receiver";
            } else {
                echo "Failed while sending mail.";
            }

            // Redirect to the next page
            $url = "date.php?firstname=${fname}&designation=${designation}&username=${username}";
            header('Location: ' . $url);
            exit;  // Ensure no further code is executed after redirection
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
}
?>
