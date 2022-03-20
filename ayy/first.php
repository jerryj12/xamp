<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pHp firstly</title>
    <style>
        input:invalid{
            border-color: red;
        }
        input:valid{
            border-color:blue;
        }
    </style>
</head>
<body>
    <?php
   // echo("Welcome to Php development!, Jerry :)
    //");
    //echo"<br>";
    //echo("    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ea!
    //");
    //$var1=2;
    //$var2=10;
    //echo $var1 * $var2;
    $name = "1";
    echo "$name is ".is_int($name)."<br>";
    $naam = is_string($name);
    if($naam == 1){
        echo "It is string <br>";
    }
    else{
        echo "No! <br>";
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
        $password= filter_var($password,FILTER_VALIDATE_INT);
        if($password==true){
            echo "password is int<br>";
        }
        else{
            echo "Not Integer <br>";
        }
    }
    else{
        echo "Empty";
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        if(ctype_alpha($name)==true){
            echo"Name is String";
        }
        else{
            echo "Name is not string";
        }


    }
    ?>
    <form action="first.php" method="post">
        <input type="text" name="password">
        <input type="text"   title="Name should Only contain letters" name="name">
        <button type="submit">button</button>
    </form>
    
</body>
</html>