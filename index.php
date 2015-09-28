<!DOCTYPE html>
<html>
<head>
<title>CodingBudget</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>
.well{
text-align: center;
}
.newArtikelDiv{
  display:none;
}
</style>
<script src="assets/jquery/jquery213.min.js"></script>
</head>

  <body>
    <div class="row">
  <div class="col-md-4 well">
    <h3>Artikel</h3>
    <hr>
    <button class="btn btn-danger" id="newArtikelDivButton">Artikel hinzufügen!</button>
    <hr>
    <div class="newArtikelDiv">
      <form method="POST" action="insertArtikel.php" id="artikelForm">
<input type="text" class="form-control" placeholder="Artikel" name="artikel" id="artikel" autofocus required>
<hr>
<span class="form-inline">
  <div class="form-group">
    <div class="input-group">
      <input type="text" class="form-control" id="exampleInputAmount" name="price_euro" placeholder="Euro...">
      <div class="input-group-addon">,</div>
      <input type="text" class="form-control" id="exampleInputAmount" name="price_cent" placeholder="Cent..." >
            <div class="input-group-addon">€</div>
    </div>
  </span>
<br>
<br>
  </div>
<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hinzufügen...</button>
</form>
<hr>
    </div>
    <div id="ajaxArtikelliste"></div>
  </div>
  <div class="col-md-4 well">
    <h3>Einkaufsliste</h3>
    <hr>
    <div id="ajaxEinkaufsliste"></div>
  </div>

  <div class="col-md-4 well">
    <h3>Finanzen</h3>
    <hr>
        <div id="ajaxFinanzen"></div>
  </div>

</div>

</body>
</html>
<script>
$('button#newArtikelDivButton').click(function(){
  $('.newArtikelDiv').fadeToggle('slow');
    $('#newArtikelDivButton').html("Option ausblenden!");

});


$("#artikelForm").submit(function(e)
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
            $("#artikelForm")[0].reset();
            $("#artikel").focus();
            getAjaxArtikel();
        }
    });
    e.preventDefault(); //STOP default action
});

function getAjaxArtikel(){
$("#ajaxArtikelliste").load("ajax_artikelliste.php");
}

function getAjaxEinkaufsliste(){
$("#ajaxEinkaufsliste").load("ajax_einkaufsliste.php");
}

function getAjaxFinanzen(){
$("#ajaxFinanzen").load("ajax_finanzen.php");
}


getAjaxArtikel();
getAjaxEinkaufsliste();
getAjaxFinanzen();
</script>
