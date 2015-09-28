<?php
require_once('assets/database/connect.php');


foreach($database->query('SELECT SUM(price_euro)
FROM artikel
AS a INNER JOIN einkaufsliste AS e ON a.artikel_id = e.artikel_id') as $row) {
$euro = $row['SUM(price_euro)'];
}
foreach($database->query('SELECT SUM(price_cent)
FROM artikel
AS a INNER JOIN einkaufsliste AS e ON a.artikel_id = e.artikel_id') as $row) {
$cent = $row['SUM(price_cent)'];
}

if($cent == 0 OR $euro == 0){
  echo "";
}else{

if ($cent < 100){
  echo "Gesammtsumme: ";
echo $euro .",".$cent;
  echo " €";
}else{
    echo "Gesammtsumme: ";
  $cent = $cent / 100;
  echo $euro + $cent;
    echo " €";
}
}
$sql = "SELECT a.artikel_id, a.artikel, a.price_euro, a.price_cent, e.einkaufsliste_id FROM artikel AS a INNER JOIN einkaufsliste AS e ON a.artikel_id = e.artikel_id ORDER BY artikel ASC";
$result = $database->query($sql);
$sql2 = "SELECT SUM(price_euro) FROM artikel AS a INNER JOIN einkaufsliste AS e ON a.artikel_id = e.artikel_id";
$result2 = mysql_query($sql2);
if ($result->num_rows > 0) {
  ?>
  <br><br>
<button id="deleteTheListButton" class="btn btn-danger btn-xs" value="deleteTheListButton">Einkaufsliste löschen!</button>
<hr>
  <?php
    while($row = $result->fetch_assoc()) {
      echo "<h4>" .$row['artikel'] . "<br><small> ".$row['price_euro'].",".$row['price_cent']."€</small></h4><button class='btn btn-link' id='deleteTheArticle' onclick='deleteTheArticle(".$row['einkaufsliste_id'].");'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button><hr>";
    }
} else {
    echo "Keine Einkaufsliste verfügbar!";
}
 ?>
<script>
$('#deleteTheListButton').click(function(){
  var deleteTheListButton = $(this).val();
$.ajax(
{
    url : "delete.php?buttonName=" + deleteTheListButton,
    type: "GET",
    success:function()
    {
      getAjaxEinkaufsliste();
    }
});
});


function deleteTheArticle(x){

$.ajax(
{
    url : "delete.php?sexyHexy=" + x,
    type: "GET",
    success:function()
    {
      getAjaxEinkaufsliste();
    }
});

};

</script>
