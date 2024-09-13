<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
<br><br><br>
    <div class="container">
        <a href="index.html"><img src="pictures/logo.png" alt="Image is not supported."></a>
        
        <form action="#" method="POST" name="myform" onsubmit="return validateform()">
            <div class="title">
                <h1>Login page</h1>
            </div>
            <br>
            <div class="form">
                <div class="inputfield">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter username" name="username" id="fillin" required>
                </div>

                <div class="inputfield">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" id="fillin" required>
                </div>

                <div class="inputfield">
                    <button type="submit" class="registerbtn" name="login">Login</button>
                </div>
            </div>
            <p>New User? <a href="signup.php">Sign up</a>.</p>
        </form>
    </div>
</body>
</html>

<?php
    // Ensure you are using the correct database connection variable
    $conn = new mysqli($servername, $username, $password, $dbname, 3306);
    
    if (isset($_POST['login'])) {
        // Sanitize and retrieve input
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $psd = mysqli_real_escape_string($conn, $_POST['psw']);

        // Check for SQL connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if username exists
        $sql_u = "SELECT * FROM users WHERE username = '$username'";
        $res_u = mysqli_query($conn, $sql_u);

        if (mysqli_num_rows($res_u) == 1) {
            // Verify username and password
            $sql_p = "SELECT * FROM users WHERE username = '$username' AND passwrd = '$psd'";
            $res_p = mysqli_query($conn, $sql_p);

            if (mysqli_num_rows($res_p) == 1) {
                // Fetch data for redirection URL
                $row = mysqli_fetch_assoc($res_p);
                $firstname = $row['firstname'];
                $designation = $row['designation'];

                // Debugging: Show firstname, designation, and username in an alert
                echo "<script>
                        alert('Firstname: " . $firstname . "\\nDesignation: " . $designation . "\\nUsername: " . $username . "');
                      </script>";

                // Remove exit and allow the redirection after the alert
                // Construct URL with parameters
                $url = 'https://conferenceroom-b3ddc4hvbnaze7gf.centralindia-01.azurewebsites.net/date.php?firstname=' . urlencode($firstname) . '&designation=' . urlencode($designation) . '&username=' . urlencode($username);

                // Redirect to date.php
                header('Location: ' . $url);
                exit(); // Ensure no further code is executed after redirection
            } else {
                echo "<script>alert('Invalid password.');</script>";
            }
        } else {
            echo "<script>alert('Username not found. Please sign up.');</script>";
        }
    }

    // Close connection
    mysqli_close($conn);
?>
