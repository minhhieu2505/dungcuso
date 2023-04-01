<!DOCTYPE html>
<html lang="vi">
<head>
    <?php include TEMPLATE.LAYOUT."head.php"; ?>
    <?php include TEMPLATE.LAYOUT."css.php"; ?>
</head>
<body>
   <?php 
      include TEMPLATE.LAYOUT."header.php"; 
      include TEMPLATE.LAYOUT."menu.php";
      include TEMPLATE.LAYOUT."slide.php";
      include TEMPLATE.LAYOUT."breadCumb.php";
   ?>
   <div class="<?=($source == 'index') ? 'wrap-home' : 'wrap-main'?>">
      <?php include TEMPLATE.$template."_tpl.php"; ?>
   </div>
   <?php
      include TEMPLATE.LAYOUT."footer.php";
      include TEMPLATE.LAYOUT."js.php";
   ?>

</body>
</html>