<html>
<body>

<?php
include "db_connect.php";
$sKluczoweFromGet = $_GET["sKluczowe"];

$sql = "SELECT id, widocznosc, opis, zdjecie, kontakt FROM oddam WHERE opis LIKE '%" . $sKluczoweFromGet . "%'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		if ($row["widocznosc"] == 1)
		{
			$string = (strlen($row["opis"]) > 13) ? substr($row["opis"],0,10).'...' : $row["opis"];
			echo "Numer: " . $row["id"] . "<h2>$string</h2>" . $row["opis"] . '<img width=800 height=800 src="data:image/jpeg;base64,'. $row['zdjecie'] .'"/>' . $row["kontakt"] . "<br>" . "<hr>";

		}
	}	
} else 
{
	echo "0 Wyników";
}

?>
<form>
 <input type="button" value="Spowrotem!" onclick="history.back()">
</form>
</body>
</html>

