<?php
$linkMan = "index.php?source=photo&act=man_photo&type=" . $type;
$linkSave = "index.php?source=photo&act=save_photo&type=" . $type;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item"><a href="<?= $linkMan ?>"
                        title="<?= $config['photo']['man_photo'][$type]['title_main_photo'] ?>">Quản lý
                        <?= $config['photo']['man_photo'][$type]['title_main_photo'] ?></a></li>
                <li class="breadcrumb-item active">Cập nhật
                    <?= $config['photo']['man_photo'][$type]['title_main_photo'] ?>
                </li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <?= $flash->getMessages('admin') ?>

        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Chi tiết
                    <?= $config['photo']['man_photo'][$type]['title_main_photo'] ?>
                </h3>
            </div>
            <div class="card-body">
                <?php if (isset($config['photo']['man_photo'][$type]['images_photo']) && $config['photo']['man_photo'][$type]['images_photo'] == true) { ?>
                    <div class="form-group">
                        <div class="upload-file">
                            <p>Upload hình ảnh:</p>
                            <label class="upload-file-label mb-2" for="file">
                                <div class="upload-file-image rounded mb-3">
                                    <img src="../upload/photo/<?= $item['photo'] ?>" alt="" class="rounded img-upload">
                                </div>
                                <div class="custom-file my-custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="file" lang="vi">
                                    <label class="custom-file-label mb-0" data-browse="Chọn" for="file">Chọn file</label>
                                </div>
                            </label>
                            <strong class="d-block text-sm">
                                <?php echo "Width: " . $config['photo']['man_photo'][$type]['width_photo'] . " px - Height: " . $config['photo']['man_photo'][$type]['height_photo'] . " px (" . $config['photo']['man_photo'][$type]['img_type_photo'] . ")" ?>
                            </strong>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($config['photo']['man_photo'][$type]['link_photo']) && $config['photo']['man_photo'][$type]['link_photo'] == true) { ?>
                    <div class="form-group">
                        <label for="link">Link:</label>
                        <input type="text" class="form-control text-sm" name="data[link]" id="link" placeholder="Link"
                            value="<?= (!empty($flash->has('link'))) ? $flash->get('link') : @$item['link'] ?>">
                    </div>
                <?php } ?>
                <?php if (isset($config['photo']['man_photo'][$type]['video_photo']) && $config['photo']['man_photo'][$type]['video_photo'] == true) { ?>
                    <div class="form-group">
                        <label for="link_video">Video:</label>
                        <input type="text" class="form-control text-sm" name="data[link_video]" id="link_video"
                            onchange="youtubePreview(this.value,'#loadVideo');" placeholder="Video"
                            value="<?= (!empty($flash->has('link_video'))) ? $flash->get('link_video') : @$item['link_video'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="link_video">Video preview:</label>
                        <div><iframe id="loadVideo" width="250"
                                src="//www.youtube.com/embed/<?= $func->getYoutube($item['link_video']) ?>"
                                <?= (@$item["link_video"] == '') ? "height='0'" : "height='150'"; ?> frameborder="0"
                                allowfullscreen></iframe></div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <?php $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
                    <?php if (isset($config['photo']['man_photo'][$type]['check_photo'])) {
                        foreach ($config['photo']['man_photo'][$type]['check_photo'] as $key => $value) { ?>
                            <div class="form-group d-inline-block mb-2 mr-2">
                                <label for="<?= $key ?>-checkbox"
                                    class="d-inline-block align-middle mb-0 mr-2"><?= $value ?>:</label>
                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                    <input type="checkbox" class="custom-control-input <?= $key ?>-checkbox"
                                        name="status[<?= $key ?>]" id="<?= $key ?>-checkbox" <?= (empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : '' ?>
                                        value="<?= $key ?>">
                                    <label for="<?= $key ?>-checkbox" class="custom-control-label"></label>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
                <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                <div class="fade show id=" tabs-lang role="tabpanel" aria-labelledby="tabs-lang">
                                    <?php if (isset($config['photo']['man_photo'][$type]['name_photo']) && $config['photo']['man_photo'][$type]['name_photo'] == true) { ?>
                                        <div class="form-group">
                                            <label for="name">Tiêu đề ():</label>
                                            <input type="text" class="form-control text-sm" name="data[name]" id="name"
                                                placeholder="Tiêu đề ()"
                                                value="<?= (!empty($flash->has('name'))) ? $flash->get('name') : @$item['name'] ?>">
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($config['photo']['man_photo'][$type]['desc_photo']) && $config['photo']['man_photo'][$type]['desc_photo'] == true) { ?>
                                        <div class="form-group">
                                            <label for="desc">Mô tả ():</label>
                                            <textarea class="form-control text-sm " name="data[description]" id="desc" rows="5"
                                                placeholder="Mô tả ()"><?= htmlspecialchars_decode((!empty($flash->has('desc'))) ? $flash->get('desc') : @$item['description']) ?></textarea>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($config['photo']['man_photo'][$type]['content_photo']) && $config['photo']['man_photo'][$type]['content_photo'] == true) { ?>
                                        <div class="form-group">
                                            <label for="content">Nội dung ():</label>
                                            <textarea
                                                class="form-control text-sm <?= (isset($config['photo']['man_photo'][$type]['content_cke_photo']) && $config['photo']['man_photo'][$type]['content_cke_photo'] == true) ? 'form-control-ckeditor' : '' ?>"
                                                name="data[content]" id="content" rows="5"
                                                placeholder="Nội dung ()"><?= htmlspecialchars_decode((!empty($flash->has('content' . $k))) ? $flash->get('content' . $k) : @$item['content' . $k]) ?></textarea>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?= (isset($item['id']) && $item['id'] > 0) ? $item['id'] : '' ?>">
        </div>
    </form>
</section>