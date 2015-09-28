<?php
require_once('assets/database/connect.php');

$schirtte = 10;

$kapital = $_POST['weezyMoney'];
$progress = 100;


$sql = "UPDATE weezy SET progress=$progress, verfuegbar=$kapital";

if ($database->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

?>
