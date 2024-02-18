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
                <button type="submit" class="registerbtn" name="register"> Login </button>
                </div>
            </div>
        <p>New User? <a href="signup.php">Sign up</a>.</p>
    </div>

    <!-- <div id="message1">
        <h3>username will have </h3>
        <p id="alphanum" class="invalid">only lowercase alphabates and numbers.</p>
        <p id="length" class="invalid">Length of username should be from 4 to 10.</p>
    </div>

    <script>
        function validateform(){
            var username = document.myform.username;
            var alphanum = document.getElementsById("alphanum");
            var length = document.getElementsById("length");
            var alnum = /^[0-9a-z]+$/;
            username.onfocus() = function1(){
                document.getElementbyId("message1").style.display = "block";
            };
            username.onblur() = function1(){
                document.getElementbyId("message1").style.display = "none";
            };
            username.onkeyup() = function1(){
                if(username.value.match(alnum)){
                    alphanum.classList.remove("valid");
                    alphanum.classList.add("invalid");
                    return true
                } else {
                    alphanum.classList.remove("invalid");
                    alphanum.classList.add("valid");
                    return false
                }
                if(username.value.length>3 && username.value.length<11){
                    alphanum.classList.remove("valid");
                    alphanum.classList.add("invalid");
                    return true
                } else {
                    alphanum.classList.remove("invalid");
                    alphanum.classList.add("valid");
                    return false
                }
            };
        }
    </script> -->


    <!-- <script type="text/javascript">
        var greeting = "Good Morning";
            if (new Date.getHours() > 12 && new Date.getHours() < 16) {
            greeting = "Good Afternoon";
            }
            else if(new Date.getHours() > 16){
                greeting = "Good Evening";
            }
            <?php $body = '<script type="text/javascript"> document.write(greeting); </script>';?>
            location.href = "test2.php?p1=" + greeting;
            
    </script> -->


    </body>
</html>

<?php
    $mysqli = new mysqli($servername, $username, $psd, $dbname);
    if(isset($_POST['register']))
    {
        $username = $_POST['username'];
        $psd= $_POST['psw'];

        echo '<div class="my_class">';

        $uid = "SELECT * FROM users WHERE username='$username'";
        $res = mysqli_query($conn, $uid);

        

        if(mysqli_num_rows($res)==1){
            $verification = "SELECT * FROM users WHERE username='$username' AND passwrd='$psd'";
            $result = mysqli_query($conn,$verification);

            if(mysqli_num_rows($result)==1){
                $sql_query = "SELECT firstname FROM users where username = '$username'";
                $result = $mysqli -> query($sql_query);
        
                $url = 'date.php';
                while($row=mysqli_fetch_array($result))
        {
                $url .= '?firstname='.$row['firstname'].'';
        }
        
                $sql_query = "SELECT designation FROM users where username = '$username'";
                $result = $mysqli -> query($sql_query);
        
                while($row=mysqli_fetch_array($result))
        {
                $url .= '&designation='.$row['designation'].'';
        }
                $sql_query = "SELECT username FROM users where username = '$username'";
                $result = $mysqli -> query($sql_query);
        
                while($row=mysqli_fetch_array($result))
        {
                $url .= '&username='.$row['username'].'';
        }
                header('Location: '.$url);
        
            }else{
            echo "<script>alert('Invalid login credentials.');
                
            </script>";
            }
        } else {
            echo "Username doesn't exist rather sign up.";
            // echo "<script>alert('Username doesn't exist rather sign up.');
                
            // </script>";
        }
        echo '</div>';
     }
?>
        
