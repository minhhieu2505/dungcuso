<?php if(!empty($breadCumb)){ ?>
<nav aria-label="breadcrumb" id="bar_breadcrumb">
  <div class="wrap-content">
  <ol class="breadcrumb">
    <?php foreach($breadCumb as $k => $v) { ?>
        <li class="breadcrumb-item"><a href="#"><?=$breadCumb[$k]?></a></li>
    <?php } ?>
  </ol>
  </div>
</nav>
<?php } ?>