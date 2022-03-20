<?php
$server="localhost";
$username="root";
$password="ahmer1234";
$database = "signup";
$con = mysqli_connect($server,$username,$password);
$db = mysqli_select_db($con,$database);
if(!$con){
// die("Connection to this database failed due to" . mysqli_connect_error());
}
else{
//echo "Connection Successful";
}
$flag = false;
$cflag= false;
$eflag = false;

if(isset($_POST['sname'])){
 

  $name=$_POST['sname'];
  $email=$_POST['smail'];
  $password=$_POST['spassword'];
  $cpassword=$_POST['cpassword'];
 
  if(ctype_alpha($name)==true && strlen($name)>=2){
     $flag = true;
   // echo "name is good";
  }
  else {
    //echo "No name";
  }
  $passwordlen = strlen((String)$password);
  if($password==$cpassword && $passwordlen >= 8){
    $cflag = true;
  //  echo "Password is Good";
  }
  else{
   // echo "No password";
  }
  $validmail = filter_var($email,FILTER_VALIDATE_EMAIL);
if($validmail==true){
  $eflag = true;
 // echo "Valid Mail";
}
if($flag == true &&  $cflag == true && $eflag == true){
 // echo "You are a loser";
    
   
  $id = "SELECT * FROM USERS;";
  $lastid = mysqli_query($con , $id);
  $num = mysqli_num_rows($lastid);
 // echo $num . "<br>";
  $num++;
  $query = "INSERT INTO users Values('$num','$name','$password','$email');";
  if($con->query($query)==true){
    //echo "Successfully entered into database <br>";
   
  }
  else{
 //   echo "Nay";
  }
  }
 // else{
    //echo "Also a failure";
  //}
 }
 
 $login = false;
  $loginp = false;
  $failed = false;
 if(isset($_POST['loginame'])){
 
     
  $loginame = $_POST['loginame'];
  $loginpass = $_POST['loginpass'];

  if(ctype_alpha($loginame)==true && strlen($loginame)>=2){
    $login = true;
  // echo "name is good";
 }
 else {
 //  echo "No name";
 }
 $passwordl = strlen((String)$loginpass);
 if($passwordl >= 8){
   $loginp = true;
 //  echo "Password is Good";
 }
 else{
//   echo "No password";
 }
 if($login==true && $loginp==true){
  $sql = "SELECT * FROM USERS WHERE name = '$loginame' and password = '$loginpass';";
  // try{
   // echo $sql;
    $rows = mysqli_query($con , $sql);
    $nums = mysqli_num_rows($rows);
    if($nums>=1){
   //   echo "<br>"."Welcome to newYork";
      $failed = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = $loginame;
      header('Location:test.php?room='.$loginame);
      exit();
    }
    else{
      
    }
    //echo $nums . "<br>"."Welcome to newYork";
  // }
  // catch(exception $e){
    // echo "Failed";
   //}
 }
}
$con->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login php bootstrap</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#loginform">Log in</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#signbtn">Sign up</a>
        </li>
      </ul>
    </div>
  </div>
 </nav>
<div class="loginform" id="loginform">
<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="login.php" method="post" id="loggin"> 
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa-solid fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="loginame" required>
						<?php if($login == false && isset($_POST['loginame']) ){ echo "<p>Invalid Username </p>" . $login = true ; }?>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="loginpass" required>
            <?php if($loginp == false && isset($_POST['loginame']))
            { echo "<p>Invalid Password </p>"; }
            ?>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
            <?php if($failed == false && isset($_POST['loginame']))
            { echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Login Failed!</strong> Wrong username or password.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; }
            ?>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a class="togglebtn" id="togglebtn" href="#togglebtn">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="signup" id="signup">
<h2 class="create">Create an Account</h2>
	<form action="login.php" method="post">
	<input type="text" name="sname" class="sname" id="sname" placeholder="Enter Your Name" required>
  <?php if($flag==false && isset($_POST['sname']))
  {echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Invalid Name!</strong>.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';}?>
	<input type="email" name="smail" class="smail" id="smail" placeholder="Enter Your Email">
  <?php if($eflag==false && isset($_POST['sname']))
  {echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Invalid password</strong> Password should contain atleast 9 characters.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';}?>
	<input type="password" name="spassword" class="spassword"id="spassword" placeholder="Enter a Password">
	<input type="password" name="cpassword" class="cpassword" id="cpassword" placeholder="Confirm your Password">
  <?php if($cflag==false && isset($_POST['sname']))
  {echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong></strong> Password does not match.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';}?>
	<button class="btm" type="submit">Signup</button>
	</form>
    
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
	<script src="https://kit.fontawesome.com/dcdabd9b43.js" crossorigin="anonymous"></script>

	<script src="login.js"></script>

  </body>
</html>