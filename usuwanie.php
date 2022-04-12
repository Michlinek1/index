<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuwanie</title>
<body style="text-align: center;">
  Co chcesz usunac? Wpisz ID <br>
  <form action = "" method = "post">
  <input type="text" name = "nazw" value=" "size="30"><br>
  <input type="submit" value = "Usuwanie" name = "usun" >
  </form>
  <body>
</html>
<?php
$textbox1 = $_POST['nazw'];	
$przycisk = $_POST['usun'];
error_reporting(1);
$pol = new mysqli("localhost", "root", "", "baza");
if (mysqli_connect_error()) {
  die("Nie Połączono" . mysqli_connect_error())."<br>";
}

$sql = "SELECT ID,imie, nazwisko, zawod, mail, wyksztalcenie FROM dane";
$result = $pol->query($sql);



if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "ID" . $row["ID"]." "."Imie: " . $row["imie"]. " ".  "Nazwisko: " . $row["nazwisko"]. " " . "Zawód:". $row["zawod"]." ". "Mail:".$row["mail"]. " ". "Wykształcenie"." ".$row["wyksztalcenie"]. "<br>";
    }
 } else {
header("Location: index.php");
 }
 echo $result->num_rows."<br>";

if(isset($przycisk)){
  mysqli_query($pol, "DELETE FROM dane where id = $textbox1");

}elseif($result->num_rows  < $textbox1){
  echo "Taki record nie istnieje!";
}



?>


