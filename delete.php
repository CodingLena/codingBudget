<?php
require_once('assets/database/connect.php');

if($_GET['buttonName'] == "deleteTheListButton" AND $_GET['buttonName'] != NULL){
$sql = "DELETE FROM einkaufsliste";

if ($database->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

}else{
$sexyHexy = $_GET['sexyHexy'];
$sql = "DELETE FROM einkaufsliste WHERE einkaufsliste_id = $sexyHexy";

if ($database->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
?>
