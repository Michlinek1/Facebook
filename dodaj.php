<?php
session_start();
if ($_SESSION['zalogowany']!=True) {
    header("location:logowanie.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie posta</title>
    <script defer src="counter.js"></script>
    <link rel ="stylesheet" href = "style.css">
</head>
<body>
    <form method = "POST">
    Zawartość posta<br>
    <textarea type="text" id="post1" name="post1" oninput = "funkcja()" maxlength="64" > </textarea>
    <h1 id="licznik"></h1><br>
    <input type="submit" value="Prześlij post" name="submit">
</form>
</body>
</html>
<?php
$pol = mysqli_connect("localhost", "root", "", "baza");

if (isset($_POST["submit"])) {
    if (!empty($_POST["post1"])) {
        mysqli_query($pol,"INSERT INTO posty(login,content) VALUES($_SESSION[login],$_POST[post1])");
    }
}
else {
    echo "wystapil blad sproboj poniownie pozniej";
}


?>