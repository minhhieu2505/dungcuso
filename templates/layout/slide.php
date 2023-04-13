<div class="wrap-content dflex">
    <div class="space-slide"></div>
    <?php if(count($slider)) { ?>
        <div class="slideshow">
            <?php foreach($slider as $v) { ?>
                <div>
                    <div class="slideshow-item">
                        <a class="slideshow-image scale-img" href="<?=$v['link']?>" title="<?=$v['name']?>">
                            <img src="upload/photo/<?=$v['photo']?>" alt="" width="990" height="375">
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <?php if ($advertise1): ?>
        <div class="advertise-header">
            <?php foreach ($advertise1 as $v): ?>
                <div>
                    <div class="items">
                        <a class="scale-img" href="<?=$v['link']?>" title="<?=$v['name']?>">
                            <img src="upload/photo/<?=$v['photo']?>" alt="" width="350" height="190">
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>