<?php
//echo " Thaaaaaaaaankkkkkkkkk yooououououuouououououououuo";
$insert = false;    

if(isset($_POST['name'])){
  $server="localhost";
  $username="root";
  $password="ahmer1234";
  $database="travel";

  $con = mysqli_connect($server,$username,$password);
  $db= mysqli_select_db($con,$database);
  if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());

  }
 //echo "Success Connecting to the db";

 $name = $_POST['name'];
 $gender = $_POST['gender'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];

 $lastid = "SELECT * from people;";
 $id = mysqli_query($con,$lastid);
 $num = mysqli_num_rows($id);
 $num++;
if(!empty($name) && !empty($phone)){
    $sql="INSERT INTO people values('$num','$name','$gender','$email','$phone');";
    //echo $sql;

    try{
    if($con->query($sql)==true){
    $insert = true;

    }
    else{
    echo "Error: $sql <br> $con->error ";
        }
    }
    catch(execption e){
        echo "Failed";
    }
}
else{
    echo "Nothing";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelling to Kashmir</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Welcome to Kashmir Trip</h1>
        <p>Enter details and submit the form to participate</p>
       <!-- <?php 
        if($insert == true && $_POST['submit']){
             echo"<p class='submitMsg'>Thank You for submitting the form</p>";
        }
        $insert = false;
        ?>
    -->
    </div>
    <div class="forms">
    <form action="index.php" method="post">
        <label for="name">Enter your name</label>
        <input type="text" name="name" id="name" required>
        <label for="gender">Enter your gender</label>
        <input type="gender" name="gender" id="gender" required>
        <label for="email">Enter your email</label>
        <input type="email" name="email" id="email" required>
        <label for="phone">Enter your phone number</label>
        <input type="phone" name="phone" id="phone" required>
        <button type="submit">Submit</button>
    </form>

</div>
    <script src="index.js"></script>
</body>

</html>
