<?php
session_start();
if ($_SESSION['zalogowany']!=True) {
    header("location:logowanie.php");
}
$pol = mysqli_connect("localhost", "root", "", "baza");
$sql= mysqli_query($pol,"SELECT * FROM posty");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facenbok</title>
    <link rel = "stylesheet" href = "style.css">
    
</head>
<body>
<ul class="nav">
<li><a href="index.php">Strona główna</a></li>
<li><a href="dodaj.php">Dodaj post</a></li>
<li><a href="wyloguj.php">Wyloguj się</a></li>
</ul>
<?php
if (mysqli_num_rows($sql)<1) {
    echo "Brak postow";
}
else {
    $row= mysqli_fetch_assoc($sql);
    echo $row["login"]." Dodał post!". " O godzinie $row[datawystawienia]";
}
?>
<div class='post'>
    <div class = 'box'>
        <span class='user'>User</span>
        <span class = 'godzina'>2222</span>
    </div>
</div>
</body>
</html>