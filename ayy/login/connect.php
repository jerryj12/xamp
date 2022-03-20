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
$room = $_POST['room'];
$sql = "SELECT msg,time,ip from room where room='$room';";

$res = '';
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
          $res = $res. '<div class= "Container">';
          $res = $res. $row['ip']; 
          $res = $res. " says <p>" . $row['msg'];
          $res = $res. '</p> <span class="time-right">'. $row["time"] .'</span> </div>';
      }
}
echo $res;
?>