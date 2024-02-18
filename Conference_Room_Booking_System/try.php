<?php
  $servername = "localhost";
  $username = "root";
  $psd = "";
  $dbname = "project_adp";

  $conn = mysqli_connect($servername, $username, $psd, $dbname);

  if(!$conn){
      die('Could not Connect MySql Server:'.mysqli_connect_error());
  }
 

   
?>
<style>
 body {
  font-family: 'Roboto';
}

.days {
  width: 1000px;
}

.day {
  width: 120px;
  height: 230px;
  background-color: #efeff6;
  padding:10px;
  float:left;
  margin-right:7px;
  margin-bottom:5px;
}

.datelabel {
  margin-bottom: 15px;
}

.timeslot {
  background-color: #00c09d;
  width: auto;
  height: 20px;
  color: white;
  padding:7px;
  margin-top: 5px;
  font-size: 14px;
  border-radius: 3px;
  vertical-align: center;
  text-align:center;
}

.timeslot:hover { 
  background-color: #2CA893;
  cursor: pointer;
} 
</style>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<form action="try.php" method="post">  

<tr><td>UserName:</td><td> <input type="text" name="name"/></td></tr>   
<br>
<tr><td>Date:</td><td> <input type="date" name="Date"/></td></tr>
<br>
<label for="Designation">Designation</label>
      <select name="Designation" id="Designation">
        <option value="Student">Student</option>
        <option value="Faculty">Faculty</option>
      </select>
<br>
<label for="Conference room">Conference room</label>
  <select name="Conference_room" id="Conference room">
        <option value="Conference room 1">Conference room 1</option>
        <option value="Conference room 2">Conference room 2</option>
        <option value="Conference room 3">Conference room 3</option>
        <option value="Conference room 4">Conference room 4</option>
        <option value="Conference room 5">Conference room 5</option>     
  </select>
<br>
<label for="timeslot">Time Slot</label>
  <select name="timeslot" id="timeslot">
        <button value="timeslot 1">9:00 - 10:00</button>
        <option value="timeslot 2">10:00- 11:00</option>
        <option value="timeslot 3">11:00- 12:00</option>
        <option value="timeslot 4">12:00- 1:00</option>
        <option value="timeslot 5">1:00- 2:00</option>
        <option value="timeslot 6">2:00- 3:00</option>
        <option value="timeslot 7">3:00- 4:00</option>
        <option value="timeslot 8">4:00- 5:00</option>
        <option value="timeslot 9">5:00- 6:00</option>
        <option value="timeslot 10">6:00- 7:00</option>
        <option value="timeslot 11">7:00- 8:00</option>

  

<div class="inputfield">
                    
                    <input type="submit" class="registerbtn" value="Register" name="register">
                </div>
            </div>  
</form> 
</body>   
</html>
<?php
if(isset($_POST['register'])){
     $name=$_POST['name'];//receiving name field value in $name variable  
     $date=$_POST['Date'];//receiving password field value in $password variable 
     $desig=$_POST['Designation'];
     $Conference_room=$_POST['Conference_room'];
     $time_slot=$_POST['timeslot'];
     $sql = "CREATE TABLE MyGuests (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      
      if (mysqli_query($conn, $sql)) {
        echo "Data inserted into table";
      } else {
        echo "Error inserting data: " . mysqli_error($conn);
      }
   
      echo "Welcome: $name, your Conference room is: $Conference_room";  
  }
 
?>
