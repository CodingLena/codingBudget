<?php
$prozent = 100;
 ?>
<div class="progress">
  <?php if($prozent == 0 OR $prozent <= 30){ ?>
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prozent;?>%"></div>
  <?php }elseif($prozent == 31 OR $prozent <= 60){?>
    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prozent;?>%"></div>
<?php  }elseif($prozent == 61 OR $prozent <= 100){?>
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prozent;?>%"></div>
<?php } ?>
</div>
