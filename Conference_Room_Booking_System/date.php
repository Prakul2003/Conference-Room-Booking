<?php include("connection.php") ?>

<?php $firstname = $_GET["firstname"]; ?>
<?php $designation = $_GET["designation"]; ?>
<?php $username = $_GET["username"]; ?>
<?php 
if($designation == 'Student'){
    $action = "register_prakul.php"; 
    //echo $username;
}else if($designation == 'Faculty'){
    $action ="register_faculty.php";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <br>
<div class = "greeting">
<h1> Welcome <?php echo $_GET["firstname"]; ?>!! </h1>
</div>
    <div class="container">
    
        <a href="index.html"><img src="pictures/logo.png" alt="Image is not supported." ></a>    
        
        <form action= "<?php echo $action; ?>" method="GET" name="myform" onsubmit="return validateform()">
            <div class="title">
                <h2> Please Choose </h2>
            </div>
<br>

            <div class="form">
                <div class="inputfield">
                    <label for="date"><b>Required Date: </b></label>
                    <input type="date" id="myDate" name="date" min="2018-01-01" required>
                </div>
                
                <div class="inputfield">
                <label for="cars"><b>Required Room: </b></label>
                    <select id="conf_room" name="conf_room">
                         <option value="C_1">C-1 (in North Campus)</option>
                         <option value="C_2">C-2 (in South Campus)  </option>
                         <option value="C_3">C-3 (Dean Office Conference Room)</option>
                    </select>
                </div>    
                <input type="hidden" id="des" name="designation" value="<?php echo $designation; ?>">
                <input type="hidden" id="user" name="username" value="<?php echo $username; ?>">

                <div class="inputfield">
                <button type="submit" class="registerbtn" name="register"> Proceed to Time Slots </button>
                </div>
            </div>
    </div>
<script>
    const dateControl = document.querySelector('input[type="date"]');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = String(today.getFullYear());
    

    today_1 = yyyy + '-' + mm + '-' + dd;
    today_1 = today_1.toString();
    document.getElementById("myDate").value = today_1;
    document.getElementById("myDate").min = today_1;
</script>

    
</body>

</html>