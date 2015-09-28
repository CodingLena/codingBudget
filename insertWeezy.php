<?php
require_once('assets/database/connect.php');

$schirtte = 10;

$verfuegbar = $_POST['verfuegbar'];
$progress = $_POST['progress'];


$final = $progress / $verfuegbar;
$ready = $final * 10;
$weezytime = $progress - $ready;


$sql = "UPDATE weezy SET progress=$weezytime, verfuegbar=$verfuegbar-10";

if ($database->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

?>
