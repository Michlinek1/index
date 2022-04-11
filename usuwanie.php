<?php
error_reporting(0);
$pol = new mysqli("localhost", "root", "", "baza");
if (mysqli_connect_error()) {
  die("Nie Połączono" . mysqli_connect_error())."<br>";
}
echo "Połączono! <br>";
$sql = "SELECT imie, nazwisko, zawod, mail, wyksztalcenie FROM dane";
$result = $pol->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "Imie: " . $row["imie"]. " ".  "Nazwisko: " . $row["nazwisko"]. " " . "Zawód:". $row["zawod"]." ". "Mail:".$row["mail"]. " ". "Wykształcenie"." ".$row["wyksztalcenie"]."<br>";
    }
 } else {
    echo "Nie ma żadnych danych! - stwórz tabelkę ";
 }






?>
<form action = "index.php" method = "post">
<input type = "submit" value = "wyjdz" name = "wyjdz">
</form>


<input type="submit" value = "Usuwanie" name = "usun" 


<?php

function usunWszystko($pol){
    mysqli_query($pol, "DROP TABLE dane");
}

if(isset($_POST["usun"])){
    usunWszystko($pol);
    echo "Tabela została usunięta!";
}



?>



