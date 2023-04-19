<html>
# id widocznosc tytul opis zdjecie kontakt
<head>

</head>

<body>
<h1> Szukaj</h1>


<form action="/szukaj.php">
  <label for="sKluczowe">Szukaj, Słowo kluczowe</label><br>
  <input type="text" id="sKluczowe" name="sKluczowe" value="znalezione"><br>
  <input type="submit" value="Submit">
</form> 
<hr>

<a href="/dodaj.php"><h2>Dodaj</h2></a>
<h1> Oddam</h1> 
<hr>
<?php

include "db_connect.php";



$sql = "SELECT id, widocznosc, opis, zdjecie, kontakt FROM oddam";
$result = $mysqli->query($sql);

if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		if ($row["widocznosc"] == 1)
		{
			$string = (strlen($row["opis"]) > 13) ? substr($row["opis"],0,10).'...' : $row["opis"];
			//echo "Numer: " . $row["id"] . "<h2>$string</h2>" . $row["opis"] . '<img width=800 height=800 src="data:image/jpeg;base64,'.base64_encode($row['zdjecie']).'"/>' . $row["kontakt"] . "<br>";
				echo "Numer: " . $row["id"] . "<h2>$string</h2>" . $row["opis"] . '<img width=800 height=800 src="data:image/jpeg;base64,'. $row['zdjecie'] .'"/>' . $row["kontakt"] . "<br>" . "<hr>";

			//echo "Numer: " . $row["id"] . "<h2>$string</h2>" . $row["opis"] . '<img width=800 height=800 src="data:image/jpeg;base64,'. $row['zdjecie'] .'"/>' . $row["kontakt"] . "<br>";
		}
	}	
} else 
{
	echo "0 results";
}

?>

<footer>Andrzej Hochuł, AndrzejHochul@outlook.com, 732190908 <=== w celu edycji, czy zrealizowania ogłoszenia, proszę o kontakt z administracją</footer>

</body>


</html>