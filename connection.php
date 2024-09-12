<?php
    $username = "andvjlrmxw";
    $servername = "conference-server.mysql.database.azure.com";
    $psd = "MTRqQTdsj6RRcTp";
    $dbname = "project_adp";
    
//     $conn = mysqli_init();
// mysqli_real_connect($conn, "conference-server.mysql.database.azure.com", "andvjlrmxw", "MTRqQTdsj6RRcTp", "project_adp", 3306, MYSQLI_CLIENT_SSL);

    $conn = mysqli_connect($servername, $username, $psd, $dbname);

    if(!$conn){
        die('Could not Connect MySql Server:'.mysqli_connect_error());
    }
    //else{
        //echo "Vatsal";
    //}
?>