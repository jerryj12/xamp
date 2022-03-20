<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pp tut</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
              max-width: 70%;
              background-color: lightpink;
              margin:auto;
              text-align:center;
              padding: 20px;
        }
    </style>
</head>
<body>
    <?php
    //constant:
    define('pi',3.14);
    $myvar=(true && true);
    echo var_dump($myvar);
    echo("<br>");
    $a = " Strings hun bhai";
    echo var_dump($a);
    echo pi;
    ?>
    <div class="container">
        <h1>This is Jerry</h1>
        <?php
        $age = 8;
        if($age>17){
            echo "You can go to party";
        }
        else{
            echo"GEt out! You lil bastard";
        }

        ?>

    </div>
</body>
</html>