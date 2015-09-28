<?php
require_once('assets/database/connect.php');
$artikelId = $_GET['artikelId'];
$sql = "DELETE FROM artikel WHERE artikel_id = $artikelId";

if ($database->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}


?>
