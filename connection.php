<?php
    $servername = "localhost";
    $username = "root";
    $psd = "";
    $dbname = "project_adp";
    
    $conn = mysqli_connect($servername, $username, $psd, $dbname);

    if(!$conn){
        die('Could not Connect MySql Server:'.mysqli_connect_error());
    }
    //else{
        //echo "Vatsal";
    //}
?>