<?php
$pol = new mysqli("localhost", "root", "");
if (mysqli_connect_error()) {
  die("Nie Połączono" . mysqli_connect_error())."<br>";
}
$sql = mysqli_query($pol, "CREATE DATABASE if not exists baza");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formularz</title>
	<style>
	p{
		font-weight: bold;
		font-size: 14px;
	}
	#wyk{
		font-weight: bold;
		font-size: 11px;
	}
	</style>
</head>
<body style="text-align: center;">
	
	<form action = "skrypt_form.php" method = "post">

	<p>Formularz kontaktowy:</p>
	Nazwisko: <br>
	<input type="text" name = "nazw" value=" "size="30"><br>
	Imie: <br>
	<input type="text" name = "im" value=" "size="30"><br>
	Zawód: <br>
	<input type="text" name = "zaw" value=" "size="30"><br>
	Adres e-mail: <br>
	<input type="text" name = "adr" value=" "size="30"><br>

	<p id ="wyksz">Wykształcenie:</p>
	<input type="radio" value = "podstawowe" name="wyksz" checked> Podstawowe <br>
	<input type="radio" value = "srednie" name="wyksz">Srednie<br>
	<input type="radio" value = "wyzsze" name="wyksz">Wyższe<br>

	<input type = "checkbox" name = "opcje" maxlenght="1">
	Zgadzam się na przetwarzanie moich danych osobowych<br> <br>
	<input type = "submit" value = "wyślij" name = "wyslij"> &nbsp;  &nbsp;
	<input type = "reset" value = "wyczysc" name = "Cancel">&nbsp;  &nbsp;
	</form>
	<form action="usuwanie.php" method="post">
	<input type ="submit" value = "Usuń" name = "usun" >&nbsp;  &nbsp;
	</form>

<?php
session_start();
error_reporting(0);
$nazw = $_POST['nazw'];	
$im= $_POST['im'];
$zaw= $_POST['zaw'];
$adr= $_POST['adr'];
$checkbox = $_POST['opcje'];
$usuwanie = $_POST['zeruj'];

$_SESSION['nazw'] = $nazw;
$_SESSION['im'] = $im;
$_SESSION['zaw'] = $zaw;
$_SESSION['adr'] = $adr;

if(isset($nazw) or isset($im) or isset($im)  or isset($zaw)  or isset($adr) or  isset($checkbox)){
	echo " Jednen textbox jest puste albo nie zgodziłeś się z regulaminem!<br>";

}else{
	echo "Twoje odpowiedzi:<br>".$_POST['nazw'].$_POST['im'].$_POST['zaw'].$_POST['adr']. "<br>";
	echo "Zostalo wybrano wyksztalcenie:<br>".($_POST['wyksz']). "<br>";		

}

	






?>

</body>
</html>
