<?php
$imie = $_POST('im');
$naziwsko = $_POST('nazw');
$zawod = $_POST('zaw');
$pol = new mysqli("localhost", "root", "", "baza");


if (mysqli_connect_error()) {
    die("Nie Połączono" . mysqli_connect_error());
  }
echo "Połączono!";

$pol -> query("create TABLE dane (
  imie VARCHAR(20)
  nazwisko VARCHAR(20)
  zawod VARCHAR(20)
  mail VARCHAR(20)
  wyksztalcenie VARCHAR(20)  
  ) ");
?>