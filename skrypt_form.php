
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
  imie VARCHAR(20),
  nazwisko VARCHAR(20),
  zawod VARCHAR(20),
  mail VARCHAR(20),
  wyksztalcenie VARCHAR(20)
)");





$sqldodawanie = mysqli_query($pol, "INSERT INTO dane(imie, nazwisko, zawod, mail, wyksztalcenie)
Values ('$im', '$nazw','$zaw','$adr', '$checkbox')");


$pol->close()
?>
<form action = "index.php" method = "post">
<input type = "submit" value = "wyjdz" name = "wyjdz">
