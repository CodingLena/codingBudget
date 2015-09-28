<?php
$artikelId = $_GET['artikelId'];

require_once('assets/database/connect.php');

$artikel = $_POST['artikel'];
$price_euro = $_POST['price_euro'];
$price_cent = $_POST['price_cent'];

$stmt = $database->prepare("INSERT INTO einkaufsliste(artikel_id) VALUES (?)");
$stmt->bind_param('i', $artikelId);
$stmt->execute();
$stmt->close();
 ?>
