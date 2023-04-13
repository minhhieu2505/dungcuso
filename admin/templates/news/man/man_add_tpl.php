<?php
if ($act == "add") $labelAct = "Thêm mới";
else if ($act == "edit") $labelAct = "Chỉnh sửa";
else if ($act == "copy")  $labelAct = "Sao chép";

$linkMan = "index.php?source=news&act=man&type=" . $type;
if ($act == 'add') $linkFilter = "index.php?source=news&act=add&type=" . $type;
else if ($act == 'edit') $linkFilter = "index.php?source=news&act=edit&type=" . $type . "&id=" . $id;
if ($act == "copy") $linkSave = "index.php?source=news&act=save_copy&type=" . $type;
else $linkSave = "index.php?source=news&act=save&type=" . $type;

$colLeft = "col-xl-8";
    $colRight = "col-xl-4";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active"><?= $labelAct ?> <?= $config['news'][$type]['title_main'] ?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i class="far fa-save mr-2"></i>Lưu tại trang</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <?= $flash->getMessages('admin') ?>

        <div class="row">
            <div class="<?= $colLeft ?>">
                <?php
                if (isset($config['news'][$type]['slug']) && $config['news'][$type]['slug'] == true) {
                    $slugchange = ($act == 'edit') ? 1 : 0;
                    include TEMPLATE . LAYOUT . "slug.php";
                }
                ?>
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung <?= $config['news'][$type]['title_main'] ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-body card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                        <div class="tab-pane fade show active" id="tabs-lang-vi" role="tabpanel" aria-labelledby="tabs-lang">
                                            <?php if(isset($config['news'][$type]['file']) && $config['news'][$type]['file'] == true) { ?>
                                                <div class="form-group">
                                                    <div class="upload-file mb-2">
                                                        <p>Upload tập tin:</p>
                                                        <label class="upload-file-label mb-2" for="file_attach">
                                                            <div class="custom-file my-custom-file">
                                                                <input type="file" class="custom-file-input" name="file_attach" id="file_attach" lang="vi">
                                                                <label class="custom-file-label mb-0" data-browse="Chọn" for="file_attach">Chọn file</label>
                                                            </div>
                                                        </label>
                                                        <strong class="d-block text-sm mb-3"><?=$config['news'][$type]['file_type']?></strong>
                                                        <?php if(isset($item['file_attach']) && $item['file_attach'] != '') { ?>
                                                            <span class="alert d-block alert-primary" ><?=$item['file_attach']?></span>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label for="name">Tiêu đề:</label>
                                                <input type="text" class="form-control for-seo text-sm" name="data[name]" id="name" placeholder="Tiêu đề" value="<?= (!empty($flash->has('name'))) ? $flash->get('name') : @$item['name'] ?>" required>
                                            </div>
                                            <?php if (isset($config['news'][$type]['desc']) && $config['news'][$type]['desc'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="description">Mô tả:</label>
                                                    <textarea class="form-control for-seo text-sm " name="data[description]" id="description" rows="5" placeholder="Mô tả"><?= htmlspecialchars_decode($flash->get('description')) ?: htmlspecialchars_decode(@$item['description']) ?></textarea>
                                                </div>
                                            <?php } ?>
                                            <?php if (isset($config['news'][$type]['content']) && $config['news'][$type]['content'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="content">Nội dung:</label>
                                                    <textarea class="form-control for-seo text-sm form-control-ckeditor" name="data[content]" id="content" rows="5" placeholder="Nội dung"><?= htmlspecialchars_decode($flash->get('content')) ?: htmlspecialchars_decode(@$item['content']) ?></textarea>
                                                </div>
                                            <?php } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?= $colRight ?>">
                <?php if (
                    (isset($config['news'][$type]['dropdown']) && $config['news'][$type]['dropdown'] == true)
                ) { ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục <?= $config['news'][$type]['title_main'] ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isset($config['news'][$type]['images']) && $config['news'][$type]['images'] == true) { ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh <?= $config['news'][$type]['title_main'] ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            /* Photo detail */
                            $photoDetail = array();
                            $photoDetail['upload'] = "upload/news/";
                            $photoDetail['image'] = (!empty($item) && $act != 'copy') ? $item['photo'] : '';
                            $photoDetail['dimension'] = "Width: " . $config['news'][$type]['width'] . " px - Height: " . $config['news'][$type]['height'] . " px (" . $config['news'][$type]['img_type'] . ")";

                            /* Image */
                            include TEMPLATE . LAYOUT . "image.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin <?= $config['news'][$type]['title_main'] ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <?php $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
                    <?php if (isset($config['news'][$type]['check'])) {
                        foreach ($config['news'][$type]['check'] as $key => $value) { ?>
                            <div class="form-group d-inline-block mb-2 mr-2">
                                <label for="<?= $key ?>-checkbox" class="d-inline-block align-middle mb-0 mr-2"><?= $value ?>:</label>
                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                    <input type="checkbox" class="custom-control-input <?= $key ?>-checkbox" name="status[<?= $key ?>]" id="<?= $key ?>-checkbox" <?= (empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : '' ?> value="<?= $key ?>">
                                    <label for="<?= $key ?>-checkbox" class="custom-control-label"></label>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i class="far fa-save mr-2"></i>Lưu tại trang</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?= (isset($item['id']) && $item['id'] > 0) ? $item['id'] : '' ?>">
        </div>
    </form>
</section>