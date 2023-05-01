<html>
<head>

</head>

<body>
<?php
include "naglowek.php";
?>
<h1> Szukaj</h1>


<form action="/szukaj.php">
  <label for="sKluczowe">Szukaj, Słowo kluczowe</label><br>
  <input type="text" id="sKluczowe" name="sKluczowe" value="znalezione"><br>
  <input type="submit" value="Szukaj!">
</form> 
<hr>

<a href="/dodaj.php"><h2>Dodaj</h2></a>
<h1> Oddam</h1> 
<?php
include "db_connect.php";
$sql = "SELECT COUNT(*) FROM oddam WHERE widocznosc = 1";
$ilosc_lini_zapytanie = $mysqli->query($sql);
$ilosc_lini = mysqli_fetch_array($ilosc_lini_zapytanie)[0];
echo "<h3>Aktualnie jest " . $ilosc_lini . " ogłoszeń </h3>";
?>

<hr>
<?php

include "db_connect.php";

if (isset($_GET['strona'])) {
    $strona = $_GET['strona'];
} else {
    $strona = 1;
}


$sql = "SELECT COUNT(*) FROM oddam WHERE widocznosc = 1";
$ilosc_lini_zapytanie = $mysqli->query($sql);
$ilosc_lini = mysqli_fetch_array($ilosc_lini_zapytanie)[0];
$ilosc_ogloszen_na_strone = 10;
$przesuniecie = (($strona - 1) * $ilosc_ogloszen_na_strone);
$ilosc_stron = ceil($ilosc_lini / $ilosc_ogloszen_na_strone );

$sql = "SELECT id, widocznosc, opis, zdjecie, kontakt FROM oddam WHERE widocznosc = 1 LIMIT ${przesuniecie}, ${ilosc_ogloszen_na_strone}";

$result = $mysqli->query($sql);



if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$string = (strlen($row["opis"]) > 13) ? substr($row["opis"],0,10).'...' : $row["opis"];
		//echo "Numer: " . $row["id"] . "<h2>$string</h2>" . $row["opis"] . '<img width=800 height=800 src="data:image/jpeg;base64,'. $zdjecieBase64Encoded .'"/>' . $row["kontakt"] . "<br>" . "<hr>";
		echo "Numer: " . $row["id"] . "<h2>$string</h2>" . $row["opis"] . '<img width=800 height=800 src="data:image/jpeg;base64,'. $row['zdjecie'] .'"/>' . $row["kontakt"] . "<br>" . "<hr>";
	}	
} else 
{
	echo "0 results";
}


//Display page selectors

	echo "Strona: ";

	for($i = 1 ; $i <= $ilosc_stron ; $i++)
	{
		echo "<a href=\"index.php?strona=$i\">$i </a>";
	}		

?>
<br>




<footer>Andrzej Hochuł, AndrzejHochul@outlook.com, 732190908 <=== w celu edycji, czy zrealizowania ogłoszenia, proszę o kontakt z administracją</footer>

</body>


</html>