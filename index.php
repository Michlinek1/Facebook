<?php
error_reporting(0);
session_start();
$_SESSION['zalogowany'];
$_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebuk lepsza wersja</title>
    <link rel = "Stylesheet" href = "style.css">
    </head>
<body>
    <?php
        if ($_SESSION['zalogowany'] == TRUE){
    echo '<ul class="nav">';
    echo ' <li><a href="index.php">Strona główna</a></li>';
    echo '  <li><a href="wyloguj.php">Wyloguj się</a></li>';
    echo '</ul>';
    }else{
            echo '<ul class="nav">';
    echo ' <li><a href="index.php">Strona główna</a></li>';
    echo ' <li><a href="logowanie.php">Zaloguj się</a></li>';
    echo '  <li><a href="rejestracja.php">Zarejestruj się</a></li>';
        }
    ?>
<?php
if($_SESSION['zalogowany'] == true){
    echo "Witaj $_SESSION[login]";
}



?>
</body>
</html>