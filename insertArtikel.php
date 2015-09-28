<?php
require_once('assets/database/connect.php');

$artikel = $_POST['artikel'];
$price_euro = $_POST['price_euro'];
$price_cent = $_POST['price_cent'];

$stmt = $database->prepare("INSERT INTO artikel(artikel, price_euro, price_cent) VALUES (?, ?, ?)");
$stmt->bind_param('sii', $artikel, $price_euro, $price_cent);
$stmt->execute();
$stmt->close();
 ?>
