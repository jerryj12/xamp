<?php
$server="localhost";
$username="root";
$password="ahmer1234";
$database = "signup";
$con = mysqli_connect($server,$username,$password);
$db = mysqli_select_db($con,$database);
if(!$con){
 //die("Connection to this database failed due to" . mysqli_connect_error());
}
else{
//echo "Connection Successful";
}

$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];

$sql=  "INSERT INTO room Values(null,'$msg','$room','$ip',CURRENT_TIMESTAMP);";

mysqli_query($con , $sql);


$con->close();
?>