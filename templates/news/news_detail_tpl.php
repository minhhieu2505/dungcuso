<div class="title-main"><span><?= $rowDetail['namevi'] ?></span></div>
<div class="time-main"><i class="fas fa-calendar-week"></i><span>Ngày đăng: <?= date("d/m/Y h:i A", $rowDetail['date_created']) ?></span></div>
<?php if (!empty($rowDetail['contentvi'])) { ?>
    <div class="content-main content-ck w-clear"><?= htmlspecialchars_decode($rowDetail['contentvi']) ?></div>
<?php } else { ?>
    <div class="alert alert-warning w-100" role="alert">
        <strong>Nội dung chưa cập nhật</strong>
    </div>
<?php } ?>
<?php if (!empty($news)) { ?>
    <div class="share othernews mb-3">
        <b>Bài viết khác:</b>
        <ul class="list-news-other">
            <?php foreach ($news as $k => $v) { ?>
                <li><a class="text-decoration-none" href="<?= $v['slugvi'] ?>" title="<?= $v['namevi'] ?>"><?= $v['namevi'] ?> - <?= date("d/m/Y", $v['date_created']) ?></a></li>
            <?php } ?>
        </ul>
        <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
    </div>
<?php } ?>