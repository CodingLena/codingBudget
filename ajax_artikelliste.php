<?php
require_once('assets/database/connect.php');

$sql = "SELECT artikel_id, artikel, price_euro, price_cent FROM artikel ORDER BY artikel ASC";
$result = $database->query($sql);
?>

  <?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

<div class="row">
  <div class="col-md-6" style="text-align:left;"><?php echo $row["artikel"];?></div>

  <?php
  if($row["price_euro"] == 0 AND $row["price_cent"] == 0 OR $row["price_cent"] > 99){
    echo "<span class='label label-danger'>Error!</span> <button class='btn btn-link' id='deleteTheArticle' onclick='deleteTheArticleFromArticlelist(".$row["artikel_id"].");'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>";
  }else{
   ?>
  <div class="col-md-6"style="text-align:right;"><?php echo $row["price_euro"] .",".$row["price_cent"]." €";?> <button id="insertArticle" class="btn btn-link" name="arikelID" value="<?php echo $row["artikel_id"];?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="color:green;"></span></button><button class='btn btn-link' id='deleteTheArticle' onclick='deleteTheArticleFromArticlelist("<?php echo $row["artikel_id"];?>");'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>
<?php } ?>
</div>

<?php
        //echo "<h3 style='text-align:left;'>" . $row["artikel"] . " </h3><h3 style='text-align:right;>".$row["price_euro"] .",". $row["price_cent"]."</h3>";
    }
} else {
    echo "Keine Artikel verfügbar!";
}
 ?>


<script>
$('button#insertArticle').click(function(){
var yo =  $(this).val();
$.ajax(
{
    url : "./insertToCart.php?artikelId=" + yo,
    type: "GET",
    success:function()
    {
      getAjaxEinkaufsliste();
    }
});

});

function deleteTheArticleFromArticlelist(x){
  $.ajax(
  {
      url : "./articleDelete.php?artikelId=" + x,
      type: "GET",
      success:function()
      {
        getAjaxArtikel();
      }
  });
}

</script>
