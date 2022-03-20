<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getpara</title>
</head>
<body>
    <?php
       if(isset($_POST['name'])){
           $name = $_POST['name'];
           echo '<script language="javascript">';
           echo 'alert("'. $name . '");';
          // echo 'window.location="localhost/ayy/mail.php?room='. $name .'";';
           header ('location:mail.php?room='. $name .';');
       }
    ?>
<form action="prac.php" method="Post">   
<input type="text" name="name" placeholder="Name">
<button type="submit">Send</button>
</form> 
</body>
</html>