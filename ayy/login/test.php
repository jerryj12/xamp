 <?php

session_start();
if(!isset($_SESSION['name'])){ //|| $_SESSION['loggedin']!=true){
   header("location:login.php");
   exit;


   
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Welcome To My Site</title>
    <style>
        .ti{
            margin: 10px;
            padding: 5px;
            place-items: center;
            text-align: center;
            color: Black;
            height: 30px;
            background-color: rgb(0, 0, 0,.39);
            font-size= 20px;
            font-weight: bold;
        }
        body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.scrol{
  height: 350px;
  overflow-y: auto;
}
.navbar{
  background-color: #e3f2fd;
}

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="ti">
        <?php
        $roomname =  $_GET['room'];
    echo '<h>WELCOME  '. $roomname .'</h1>';
    ?>
   
    <h2>Chat Messages</h2>

<div class="container">
  <div class="scrol">
  
  </div>
</div>

<input type="text" class="form-control" name="usermsg" class ="usermsg" id="usermsg" placeholder="Add message"><br>
<button class="btn btn-default" name="submitmsg" class="submitmsg" id="submitmsg">Send</button>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
 crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<!-- Script -->
<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<script type="text/javascript">
setInterval(runFunction,1000);
function runFunction(){
  $.post("connect.php",{ room: '<?php echo $roomname  ?>'},
  function(data,status){
    document.getElementsByClassName('scrol')[0].innerHTML=data;
  }

  )
}

 $("#usermsg").keypress(function(event) {
            if (event.keyCode === 13) {
                $("#submitmsg").click();
            }
        });
   
        


$("#submitmsg").click(function(){
  var clientmsg= $("#usermsg").val();
  $.post("postmsg.php", {text : clientmsg, room: '<?php echo $roomname  ?>', ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
  function(data,status){
     document.getElementsByClassName('scrol')[0].innerHTML = data ;}); 
  $("#usermsg").val("");
  return false;

});
</script>

</body>
</html>