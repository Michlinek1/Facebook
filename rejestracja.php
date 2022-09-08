<?php
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
    <form method="POST">
        Login<br>
        <input type="text" name="login" required><br>
        Hasło<br>
        <input type="password" name="password" required><br>
        E-mail<br>
        <input type="text" name="email" required>
        <br><br>
        <input type="submit" name="submit" value="Zarejestruj się" required>
    </form>
</body>
</html>
<?php
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = mysqli_query($pol,"SELECT LOGIN, adres FROM uzytkownik where adres='$email' or LOGIN = '$login'");

if (mysqli_num_rows($sql) > 0) {
    echo "<h1 class='tekst'>Login badz email  jest już zajęty </h1>";
    exit();
}
if(isset($_POST["submit"])){
    $sql = mysqli_query($pol,"INSERT INTO uzytkownik(LOGIN, PASSWORD, adres) VALUES('$login','$password','$email')");
    if(!$sql){
        return;
    }
    header("Location: index.php");
    $_SESSION['zalogowany'] = True;
    $_SESSION['login'] = $login;
}




?>