<?php
require_once('assets/database/connect.php');

$sql = "SELECT * FROM weezy";
$result = $database->query($sql);
if ($result->num_rows > 0) {
  ?>
<button id="newKapital" class="btn btn-warning btn-xs">Neues Kapital eintragen</button>
  <form method="POST" action="refreshWeezy.php" id="refreshWeezy" style="display:none;">
      <br><br>
    <input type="text" name="weezyMoney" class="form-control" placeholder="Unser Kapital..." required>
    <br>
    <input type="submit" value="Speichern!" class="btn btn-info btn-block">
  </form>

<hr>
<form name="weezyForm" id="weezyForm" method="POST" action="insertWeezy.php">
  <?php
    while($row = $result->fetch_assoc()) {
      ?>
      <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['progress'];?>%;">
        </div>
      </div>
      <input type="hidden" name="verfuegbar" value="<?php echo $row['verfuegbar'];?>">
      <input type="hidden" name="progress" value="<?php echo $row['progress'];?>">
      <?php
echo "Verfügbar: " . $row['verfuegbar'];
    }
} else {
    echo "Keine freien Mittel verfügbar!";
}
?>
<br>
<button type="submit" id="updateWeezyButton" class="btn btn-danger" value="deleteTheListButton">-10€!</button>
</form>
<script>
$("#weezyForm").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            getNewWeezy();
        }
    });
    e.preventDefault(); //STOP default action
});

$("#refreshWeezy").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            getNewWeezy();
        }
    });
    e.preventDefault(); //STOP default action
});

function getNewWeezy(){
$("#weezyContent").load("ajax_weezy.php");
}

$('#newKapital').click(function(){
  $('#refreshWeezy').fadeIn('slow');
});


</script>
