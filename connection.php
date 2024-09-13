<?php
    
    // Create an instance of PHPMailer
    $username = "andvjlrmxw";
    $servername = "conference-server.mysql.database.azure.com:3306";
    $psd = "MTRqQTdsj6RRcTp";
    $dbname = "conference-database";
    
    $conn = mysqli_init();
    mysqli_real_connect($conn, "conference-server.mysql.database.azure.com", "andvjlrmxw", "MTRqQTdsj6RRcTp", "conference-database", 3306, MYSQLI_CLIENT_SSL);

    // $conn = mysqli_connect($servername, $username, $psd, $dbname, 3306);

    // if(!$conn){
    //     die('Could not Connect MySql Server:'.mysqli_connect_error());
    // }
    //else{
        //echo "Vatsal";
    //}
?>