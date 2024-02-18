<?php include("connection.php") ?>
<?php
$mysqli = new mysqli($servername, $username, $psd, $dbname);
$myArray = array();
$username = 'B21327';
$result = $mysqli->query("SELECT * FROM users where username = '$username'");
while($row = $result->fetch_array()) {
    $myArray[] = $row;
}
$a = json_encode($myArray);
//echo json_encode($myArray);
echo
'<script>
var json_obj = <?php echo $a; ?>
let obj = json_obj[0];

console.log(obj.id);

</script>'
?>