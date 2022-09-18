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
    <script defer src = "info.js"></script>
    <link rel ="stylesheet" href = "style.css">
</head>
<body>
    <form method = "POST">
    Zawartość posta<br>
    <textarea type="text" id="post1" name="post1" oninput = "funkcja()" maxlength="64" minlength="10" > </textarea>
    <h1 id="licznik">0</h1><br>
    <input type = "checkbox" id ='checkbox'  onclick = "ischecked()" name = "niepubliczne"> Niepubliczne? <br>
    <input type="submit" value="Prześlij post" name="submit">
</form>
<div id = "info">
    <h1 class = "infoh1">Jeśli ustawiłeś na niepubliczne, nikt nie będzie mógł zobaczyć tego postu bez specjalnego linku! </h1>
</div>
</body>
</html>
<?php
$pol = mysqli_connect("localhost", "root", "", "baza");

if (!empty($_POST["post1"])) {
    if(!isset($_POST['niepubliczne'])){
    mysqli_query($pol,"INSERT INTO posty(login,content, publiczny) VALUES($_SESSION[login],$_POST[post1], 1)");
    }else{
        mysqli_query($pol,"INSERT INTO posty(login,content) VALUES($_SESSION[login],$_POST[post1])");
    }
    
    header("Location: main.php");
}




?>