<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
<br>
<br>
<br>
    <div class="container">
    
        <a href="index.html"><img src="pictures/logo.png" alt="Image is not supported." ></a>    
        
        <form action="#" method="POST" name="myform" onsubmit="return validateform()">
            <div class="title">
                <h1> Login page </h1>
            </div>
<br>

            <div class="form">
                <div class="inputfield">
                    <label for="username"><b>UserName</b></label>
                    <input type="text" placeholder="Enter username" name="username" id="fillin" required>
                </div>

                <div class="inputfield">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your password contains at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="fillin" required>            
                </div>

                <div class="inputfield">
                    <button type="submit" class="registerbtn" name="login"> Login </button>
                </div>
            </div>
        <p>New User? <a href="signup.php">Sign up</a>.</p>
    </div>

    </body>
</html>

<?php
    // Ensure you are using the correct database connection variable
    $conn = new mysqli($servername, $username, $password, $dbname, 3306); // Adjust as per your connection variables
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $psd = $_POST['psw'];

        // Check for SQL connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape inputs to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $psd = mysqli_real_escape_string($conn, $psd);

        // Check if username exists
        $sql_u = "SELECT * FROM users WHERE username = '$username'";
        $res_u = mysqli_query($conn, $sql_u);

        // if (mysqli_num_rows($res_u) == 1) {
        //     // Verify username and password
        //     $sql_p = "SELECT * FROM users WHERE username = '$username' AND passwrd = '$psd'";
        //     $res_p = mysqli_query($conn, $sql_p);

        //     if (mysqli_num_rows($res_p) == 1) {
        //         // Fetch data for redirection URL
        //         $row = mysqli_fetch_assoc($res_p);
        //         $firstname = $row['firstname'];
        //         $designation = $row['designation'];

        //         // Construct URL with parameters
        //         $url = 'https://conferenceroom-b3ddc4hvbnaze7gf.centralindia-01.azurewebsites.net/date.php?firstname=' . urlencode($firstname) . '&designation=' . urlencode($designation) . '&username=' . urlencode($username);

        //         // Redirect to date.php
        //         header('Location: ' . $url);
        //         exit(); // Ensure no further code is executed after redirection
        //     } else {
        //         echo "<script>alert('Invalid password.');</script>";
        //     }
        // } 
        if (mysqli_num_rows($res_p) == 1) {
            // Fetch data for redirection URL
            $row = mysqli_fetch_assoc($res_p);
            $firstname = $row['firstname'];
            $designation = $row['designation'];
        
            // Debug: Check if firstname and designation are fetched correctly
            echo "Firstname: " . $firstname . "<br>";
            echo "Designation: " . $designation . "<br>";
            echo "Username: " . $username . "<br>";
        
            // Stop execution temporarily to see the output
            exit();
        
            // Construct URL with parameters
            $url = 'https://conferenceroom-b3ddc4hvbnaze7gf.centralindia-01.azurewebsites.net/date.php?firstname=' . urlencode($firstname) . '&designation=' . urlencode($designation) . '&username=' . urlencode($username);
        
            // Redirect to date.php
            header('Location: ' . $url);
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
        
    }

    // Close connection
    mysqli_close($conn);
?>
