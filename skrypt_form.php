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
$tabelka =  mysqli_query($pol, "SELECT 1 FROM dane LIMIT 1" );
if($tabelka)
{
   echo "Tabelka już istnieje";
}else{
  echo "Tabelka nie istnieje";
  echo $pol -> error;
  $sql -> query("create TABLE dane (
    imie VARCHAR(20),
    nazwisko VARCHAR(20),
    zawod VARCHAR(20),
    mail VARCHAR(20),
    wyksztalcenie VARCHAR(20)
  )");

}
 




$sqldodawanie = mysqli_query($pol, "INSERT INTO dane(imie, nazwisko, zawod, mail, wyksztalcenie)
Values ('$im', '$nazw','$zaw','$adr', '$checkbox')");


$pol->close()
?>
