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
<body>
	
	<form action = "wyksztalcenie.php" method = "post">
	<p>Formularz kontaktowy:</p>
	Nazwisko: <br>
	<input type="text" name = "nazw" value=" "size="30"><br>
	Imie: <br>
	<input type="text" name = "im" value=" "size="30"><br>
	Zawód: <br>
	<input type="text" name = "zaw" value=" "size="30"><br>
	Adres e-mail: <br>
	<input type="email" name = "adr" value=" "size="30"><br>

	<p id ="wyksz">Wykształcenie:</p>
	<input type="radio" value = "podstawowe" name="wyksz" checked> Podstawowe <br>
	<input type="radio" value = "srednie" name="wyksz">Srednie<br>
	<input type="radio" value = "wyzsze" name="wyksz">Wyższe<br>

	<input type = "checkbox" name = "opcje" maxlenght="1">
	Zgadzam się na przetwarzanie moich danych osobowych<br> <br>
	<input type = "submit" value = "wyślij" name = "wyslij"> &nbsp;  &nbsp;
	<input type = "reset" value = "Wyczyść" name = "zeruj">
	</form>

</body>
</html>