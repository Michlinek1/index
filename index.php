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
	
	<form action = "" method = "post">

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
	<input type="radio" value = "Podstawowe" name="wyksz"  checked> Podstawowe <br> 
	<input type="radio" value = "Srednie" name="wyksz" >Srednie<br>
	<input type="radio" value = "Wyzsze" name="wyksz" >Wyższe<br>

	<label><input type = "checkbox" name = "opcje" maxlenght="1">
	Zgadzam się na przetwarzanie moich danych osobowych<br> <br> </label>
	<input type = "submit" value = "wyślij" name = "wyslij" > &nbsp;  &nbsp; <br>  <br>
	<input type = "reset" value = "wyczysc" name = "Cancel">&nbsp;  &nbsp; <br> <br>
	
		<select name = "jezyki[]" > 
			<option value = "Język angielski">Język Angielski</option>
			<option value = "Język hiszpanski">Język Hiszpanski</option>
			<option value = "Język wloski">Język Włoski</option>
			<option value = "Język rosysjki">Język Rosysjki</option>
			<option value = "Język francuski">Język Francusk</option>
			<option value = "Język niemiecki">Język Niemiecki</option>
		</select><br>
		<br>
</form>
<input type ="submit" value = "Usuń" name = "usun" onclick="location.href = 'usuwanie.php'" >&nbsp;  &nbsp; <br> <br>
	

<?php
session_start();
error_reporting(1);
$nazw = $_POST['nazw'];	
$im= $_POST['im'];
$zaw= $_POST['zaw'];
$adr= $_POST['adr'];
$checkbox = $_POST['opcje'];
$usuwanie = $_POST['zeruj'];
$opcje = $_POST['wyksz'];
$jezyk = $_POST['jezyki'] ;

$_SESSION['nazw'] = $nazw;
$_SESSION['im'] = $im;
$_SESSION['zaw'] = $zaw;
$_SESSION['adr'] = $adr;
$pol = new mysqli("localhost", "root", "", "baza");
if (mysqli_connect_error()) {
  die("Nie Połączono" . mysqli_connect_error())."<br>";
}

$sql  = mysqli_query($pol, "create table if not exists dane (
	ID int NOT NULL  AUTO_INCREMENT,
	imie VARCHAR(20)  NOT NULL,
	nazwisko VARCHAR(20)  NOT NULL,
	zawod VARCHAR(20)  NOT NULL,
	mail VARCHAR(40)  NOT NULL,
	wyksztalcenie VARCHAR(20)  NOT NULL,
	jezyki VARCHAR(20)  NOT NULL,
	CzyZaakceptowano VARCHAR(20)  NOT NULL,
	PRIMARY KEY (ID)
  )");

  
  
$sql = "SELECT ID,imie, nazwisko, zawod, mail, wyksztalcenie FROM dane";
$result = $pol->query($sql);




	
  
if($_POST['wyslij']){
	if(!empty($nazw) && !empty($im) && !empty($zaw) && !empty($adr) && !empty($jezyk) && $checkbox == "on"  ){
			if($checkbox == "on"){
				foreach($jezyk as $wartosc){
					mysqli_query($pol, "INSERT INTO dane(imie, nazwisko, zawod, mail, wyksztalcenie, jezyki, CzyZaakceptowano)
					Values ('$im', '$nazw','$zaw','$adr','$opcje', '$wartosc', 'tak')");
					echo "Twoje odpowiedzi:<br>".$_POST['nazw']." " .$_POST['im']." " .$_POST['zaw']." " .$_POST['adr']." ". $_POST['wyksz']." ".$wartosc."<br>";
				}
				if ($result->num_rows > 0) {
					while($row = $result = $nazw && $im && $zaw && $adr && $jezyk && $checkbox == "on") {
					  echo "Taki rekord juz istnieje w bazie danych";
					}				
			
				}
					

			
			
		}

		
	}else{
		echo "Wypełnij wszystkie pola";
	}
}









?>

</body>
</html>
