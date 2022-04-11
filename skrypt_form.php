<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dodawanie</title>
<?php
error_reporting(1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$nazw = $_POST['nazw'];
$im= $_POST['im'];
$zaw= $_POST['zaw'];
$adr= $_POST['adr'];
$checkbox = $_POST['opcje'];
$pol = new mysqli("localhost", "root", "", "baza");
if (mysqli_connect_error()) {
  die("Nie Połączono" . mysqli_connect_error())."<br>";
}
echo "Połączono! <br>";
$sql  = mysqli_query($pol, "create table if not exists dane (
  ID int NOT NULL  AUTO_INCREMENT,
  imie VARCHAR(20)  NOT NULL,
  nazwisko VARCHAR(20)  NOT NULL,
  zawod VARCHAR(20)  NOT NULL,
  mail VARCHAR(20)  NOT NULL,
  wyksztalcenie VARCHAR(20)  NOT NULL,
  PRIMARY KEY (ID)
)");


if($checkbox == "on"){
  mysqli_query($pol, "INSERT INTO dane(imie, nazwisko, zawod, mail, wyksztalcenie)
  Values ('$im', '$nazw','$zaw','$adr', 'tak')");
  
}else{
  $sqldodawanie = mysqli_query($pol, "INSERT INTO dane(imie, nazwisko, zawod, mail, wyksztalcenie)
Values ('$im', '$nazw','$zaw','$adr', 'nie')");
}



$pol->close()
?>
<form action = "index.php" method = "post">
<input type = "submit" value = "wyjdz" name = "wyjdz">
