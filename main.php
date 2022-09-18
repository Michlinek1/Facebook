<?php
session_start();
if ($_SESSION['zalogowany']!=True) {
    header("location:logowanie.php");
}
$pol = mysqli_connect("localhost", "root", "", "baza");
$sql= mysqli_query($pol,"SELECT * FROM posty ORDER BY datawystawienia DESC");
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
</div>
<?php

$sql=mysqli_query($pol,"SELECT * FROM posty WHERE publiczny = 1");
if (mysqli_num_rows($sql)<1) {
    echo "Brak postow";
}
else{
    while ($row=mysqli_fetch_assoc($sql)) {
        echo "<div class='post'> <br>
        <div class = 'box'>";
        echo " <span>Użytkownik: </span>";
            echo "<span onclick = 'profile()'class='user'> $row[login] </a> </span> <br>";
            
        echo "
            <span>Godzina:</span>
            <span class = 'godzina'>$row[datazalozenia]</span> <br>
            <span>Treść: </span>";
        echo "<span class = 'content'>$row[content]</span>       
        </div>";
    
}
}
?>
</div>
</body>
<script>
    function profile(){
        alert("cos");
    }
</script>
</html>