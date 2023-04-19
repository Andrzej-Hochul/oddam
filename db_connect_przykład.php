<?php
// dla serwera SQL na hoście 127.0.0.1,( nie wpisywać localhost bo wtedy ta metoda bedzie probowałą się połączyć przez socket), używamy użytkownika oddam z hasłem HasłoDoBazyDanych, oraz używamy bazy danych 'oddam', używając portu 3306.
$mysqli = new mysqli("127.0.0.1", "oddam", "HasłoDoBazyDanych", "oddam", 3306);


//kod SQL z exportu, dla stworzenia tabeli
//CREATE TABLE `oddam` (
//  `id` int(11) NOT NULL,
//  `widocznosc` tinyint(4) NOT NULL DEFAULT 1,
//  `tytul` text DEFAULT NULL,
//  `opis` text NOT NULL,
//  `zdjecie` longblob NOT NULL,
//  `kontakt` text NOT NULL,
//  `ip` text NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
//echo $mysqli->host_info . "<br>";
?>