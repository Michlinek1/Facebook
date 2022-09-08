<?php
session_start();
if ($_SESSION['zalogowany']!=True) {
    header("location:zaloguj.php");
}

$_SESSION['zalogowany']=false;
session_destroy();
header("Location: index.php")





?>
