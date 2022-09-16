<?php
error_reporting(0);
session_start();
$pol=mysqli_connect("localhost","root","","baza");
if ($_SESSION['zalogowany']==True) {
    header("location:index.php");
}








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel = "Stylesheet" href = "style.css">
    </head>

    <ul class="nav">
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="logowanie.php">Zaloguj się</a></li>
        <li><a href="rejestracja.php">Zarejestruj się</a></li>
    </ul>
</head>
<body>  
    <form method = "POST">
        Login<br>
        <input type="text" name="login" required><br>
        Hasło<br>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" name="submit" value="Zaloguj się" required>
    </form>


    <?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    if(isset($_POST['submit'])){
            $sql = mysqli_query($pol,"SELECT * FROM uzytkownik WHERE LOGIN = '$login' ");
            $row = $sql -> fetch_assoc();
            if($_POST['login'] != $row['LOGIN'] || $_POST['password'] != $row['PASSWORD'] ){
                return;
            }
            $_SESSION['login']=$login;
            $_SESSION['zalogowany']= True;
            header("Location: main.php");
        }


    


    ?>
</body>
</html>