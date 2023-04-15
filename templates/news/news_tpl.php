<div class="title-main"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>
<div class="content-main row">
    <?php if (!empty($news)) {
        foreach ($news as $k => $v) { ?>
            <div class="news col-md-6">
                <div class="row items-news">
                    <a class="news-image col-sm-5" href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>">
                        <span class="scale-img">
                            <img src="./upload/news/<?=$v['photo']?>" alt="" width="185" height="210">
                        </span>
                    </a>
                    <div class="news-info col-sm-7">
                        <h3 class="news-name">
                            <a class="text-decoration-none text-split transition" href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>"><?= $v['name'] ?></a>
                        </h3>
                        <div class="news-desc text-split"><?= $v['description'] ?></div>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="col-12">
            <div class="alert alert-warning w-100" role="alert">
                <strong>Không tìm thấy kết quả</strong>
            </div>
        </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="col-12">
        <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
    </div>
</div>