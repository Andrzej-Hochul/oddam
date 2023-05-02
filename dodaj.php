<html>
<body>

<?php
include "naglowek.php"; 
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
  <label for="opis">Opis</label><br>
  <input type="text" id="opis" name="opis" value="opis"><br>
    <label for="kontakt">kontakt</label><br>
  <input type="text" id="kontakt" name="kontakt" value="kontakt"><br>
    <label for="zdjecie">zdjecie</label><br>
  <input type="file" id="zdjecie" name="zdjecie" ><br>
  <input type="submit" value="Dodaj!">
  <h3> UWAGA po kliknieciu dodaj czekamy cierpliwie, aż zdjecie sie załaduje na serwer, kiedy gotowe formularz(ta strona) wróci do pierwotnego stanu.</h3>
</form> 

<?php

 if ( isset($_FILES["zdjecie"]) ) { 
 
include "db_connect.php";
//$sopis = $_GET["opis"];
//$skontakt = $_GET["kontakt"];
//$szdjecie = $_GET["zdjecie"];
$postopis = $_POST["opis"];
$postkontakt = $_POST["kontakt"];
$image_name = $_FILES["zdjecie"]['tmp_name'];
//var_dump($_FILES["zdjecie"]["tmp_name"]);
$sIp = $_SERVER['REMOTE_ADDR'];
$path = $_FILES['zdjecie']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext == "php")
{
	echo "dupa, Twoje IP zostało zrejestrowane, w celu unikniecia kontaktu z paskiem do dupy, zkontaktuj sie z ADministratorem";
	
	die();
}


//Wczytanie zdjecia, zmiana rozmiaru, i wrzucenie do bazdy danych w base64
$zdjecie_blob = file_get_contents(addslashes($image_name));
	$zdjecie_lokalnie = $zdjecie_blob;

	$zdjecie_IM = new Imagick();
	$zdjecie_IM->readimageblob($zdjecie_lokalnie);

	$zdjecie_IM->adaptiveResizeImage(800,800);
	$zdjecieBase64Encoded = base64_encode($zdjecie_IM);
	$postzdjecie = $zdjecieBase64Encoded;
//

$sql = "INSERT INTO oddam (id, opis, zdjecie, kontakt, ip) VALUES (NULL, '$postopis', '$postzdjecie', '$postkontakt', '$sIp' )";
$result = $mysqli->query($sql);

 }
?>

<form>
 <input type="button" value="Spowrotem!" onclick="history.back()">
</form>
</body>
</html>
