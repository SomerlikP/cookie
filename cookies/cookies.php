<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>cookies</title>
        <link rel="icon" href="icon.png" type="image/png">
    </head>

    <style>
        body{
        color: black;
        background-color: #666e7a;

        font-size: 18px;
        font-weight: bold;
        font-family: Arial;
        font-style: normal;

        padding: 1px;
        }

        .input{
            color: red;
            background-color: #666e7a;

            border: red 1.5px solid;

            padding: 5px
        }
    </style>

    <body>
        <?php
            echo "<h1><center>Witaj ponownie!</center></h1>";
            $inTwoMonths = 60 * 60 * 24 * 60 + time();
            setcookie('OstatniaWizyta', date("G:i - m/d/y"), $inTwoMonths);

            if (!isset($_COOKIE['count'])) {

                $cookie = 1;
                setcookie("count", $cookie);
            }

            else{
                $cookie = ++$_COOKIE['count'];
                setcookie("count", $cookie); 
                echo "Wyświetliłeś/aś naszą stronę ".$_COOKIE['count']." razy, "; 
            }

            setcookie('count', isset($_COOKIE['count']) ? $_COOKIE['count']++ : 1);
                

            if(isset($_COOKIE['OstatniaWizyta'])){
                $visit = $_COOKIE['OstatniaWizyta'];
                $visitCount = $_COOKIE['count'];
                echo "a twoja ostatnia wizyta była: ". $visit;
            }
            else
        ?>

        <br>
        <br>

        <?php
            if (isset($_COOKIE['user'])) {
                echo $_COOKIE["user"];
            }
            else {
                if (isset($_POST['fname'])) {
                    $post = $_POST["fname"]; 
            
                    $expire=time()+60*60*24*30;
                    setcookie("user", $post, $expire);
                }
            }
            echo "<br><br>";
        ?>

        <form action="" method="post">
            Name: <input class="input" type="text" name="fname">
            <input class="input" type="submit">
        </form>
    </body>
</html>