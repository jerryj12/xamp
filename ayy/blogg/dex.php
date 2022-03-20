<?php
  $msg = "";
  
  // If upload button is clicked ...
  $db = mysqli_connect("localhost", "root", "ahmer1234", "blog");
  if (isset($_POST['upload'])) {
    
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "image/".basename($filename);
    $title = $_POST['title'];
    $article = $_POST['text'];
          
    

  
        // Get all the submitted data from the form
        $sql = "INSERT into image values(null,'$filename','$article','$title');";
  
        // Execute query
        mysqli_query($db, $sql);
        
          
        // Now let's move the uploaded image into the folder: image
      if (move_uploaded_file($tempname, $folder))  {
          $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  //    echo "alert($msg)";
      
  
    }
    
    if(isset($_POST['commentname'])){
      $mess=$_POST['commentname'];
    $comment = $_POST['comment'];
    $ins = mysqli_query($db,"INSERT into COMMENT(name,comments)values('$mess','$comment');");
    }
    $result = mysqli_query($db, "SELECT * FROM image ORDER BY id DESC LIMIT 1;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Blogger</title>
</head>
<body>
<div id="preloader"></div>

<?php
      while($row = mysqli_fetch_array($result)){
        echo "<img class='bgbg' id='bgbg' src='image/".$row['image']."'>";
      }
        ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li>
          <a class="nav-link" id="ad">ADMIN</a>
        </li>
      </ul>

    </div>
  </nav>
  <div id="img_div">
<?php
    $resu = mysqli_query($db, "SELECT * FROM image ORDER BY id DESC LIMIT 1;");

      while($row = mysqli_fetch_array($resu)){
        echo "<img class='iam' src='image/".$row['image']."'>";
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<p>". $row['article'] ."</p>";
       
      }
    ?>
    </div>

    <h2 class="hed"> <i class="fa-solid fa-chart-simple-horizontal"></i> More Blogs for You </h2>
    <div class="double"> 
      <?php
      $idd = 0;
      $newid = 10;
      $newresult = mysqli_query($db,"SELECT * from image ORDER by id desc limit 4;");
      while($raw = mysqli_fetch_array($newresult)){
     echo "<div class='more' id='$idd'>";
     echo "<h1 id='heading'>".$raw['title']."</h1>";
     echo "<img id='$newid' src='image/".$raw['image']."'>";
     echo "<p>".$raw['article']."</p>"; 
    echo "</div>";
    $idd++;
    $newid++;
      }
    ?>
  </div>
<div id="content" class="content" >
    <form method="POST" action="dex.php" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <input type="file" name="uploadfile" value="image">
      <input type="text" name="title" class="title" placeholder="title">
      <textarea name="text" id="text" cols="30" rows="10" placeholder="Atricle here"></textarea>

      <div>
        <button type="submit" name="upload">
          UPLOAD
        </button>
      </div>
    </form>
  </div>
  <div class="drop">    
    <div class="hove">
      <input type="text" name="uname" id="uname" name="uname" pattern="[a-zA-Z]*" title="Name should only conatain letters"
         required>
         <input type="password" name="pass" id="pass" name="pass" required>
    <button class="admin" id="admin"  onclick="myFunction()">ADMIN</button>
  </div>
  </div>

  <div class="comm">
    <div class="compensate">
    <h3>ADD A COMMENT</h3>
    <form action="dex.php" method="post">
    <input type="text" name="commentname" id="commentname" placeholder="Your name" required>
    <textarea name="comment" id="comment" cols="10" rows="3" placeholder="Comment" requied></textarea>
    <button>ADD</button>
    </form>
  </div>
  </div>

  <?php
  $qery = mysqli_query($db,"SELECT * FROM COMMENT");
     while($rr  = mysqli_fetch_assoc($qery)){
       echo '<div class="tabsirah">';
       echo '<h4>'.$rr['name'].'</h4>';
       echo '<p>'.$rr['comments'].'</p>';
       echo '</div>';
     }
     $db->close();

  ?>
</div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  
  <script>
    const uname = "admin";
    const password = "admin";
    const div = document.querySelector('.content');
    const button = document.querySelector('#admin');
    const ad = document.querySelector('#ad');

    const drop = document.querySelector('.drop');

    ad.addEventListener('click',()=>{

          if(drop.style.display === 'none'){
            drop.style.display = 'flex';

          }
          else{
            drop.style.display='none';
          }

    });
    button.addEventListener('click', () => {

      var naam = document.getElementById('uname').value;
      var paas = document.getElementById('pass').value;
    if(naam === uname && paas === password){
     if(div.style.display === 'none'){
           div.style.display = 'flex';
      }
      else{
        div.style.display = 'none';
      }
    }
    else{
      alert("You are not the admin");
    }
    });
    var counter = 0;
    var myelem = document.getElementById(counter);
    myelem.onclick = function(){
   document.getElementById('img_div').innerHTML = myelem.innerHTML;
   
   }
   var myelem2 = document.getElementById(counter+1);
    myelem2.onclick = function(){
   document.getElementById('img_div').innerHTML = myelem2.innerHTML;
   

   }
   var myelem3 = document.getElementById(counter+2);
    myelem3.onclick = function(){
   document.getElementById('img_div').innerHTML = myelem3.innerHTML;
   document.getElementsByClassName('.bgbg').innerHTML= document.getElementsByClassName('.2').innerHTML;

   }
   var myelem4 = document.getElementById(counter+3);
    myelem4.onclick = function(){
   document.getElementById('img_div').innerHTML = myelem4.innerHTML;
   document.getElementsByClassName('.bgbg').innerHTML= document.getElementsByClassName('.3').innerHTML;;

   }

   var pics = document.querySelector('#img_div');
pics.addEventListener('click',()=>{
  console.log('chal raha hai');
  var news = document.getElementById('13').src;
  document.getElementById('bgbg').src = news;
  
})
  
  </script>

<script src="https://kit.fontawesome.com/dcdabd9b43.js" crossorigin="anonymous"></script>

<script>
   var loader = document.getElementById('preloader');
   window.addEventListener("load", function(){
      loader.style.display = "none";
    })
  </script>

</body>

</html>