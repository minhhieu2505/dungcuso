<?php
    $linkMan = "index.php?source=product&act=category";
    $linkSave = "index.php?source=product&act=save_cate";
    $colLeft = "col-xl-8";
    $colRight = "col-xl-4";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết danh mục sản phẩm</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        
        <div class="row">
            <div class="<?=$colLeft?>">
                <?php
                $slugchange = ($act=='edit_cate') ? 1 : 0;
                include TEMPLATE.LAYOUT."slug.php";
                ?>
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung danh mục sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Hiển thị
                            <div class="form-group d-inline-block mb-2 mr-2">
                                    <label for="<?=$key?>-checkbox" class="d-inline-block align-middle mb-0 mr-2"><?=$value?>:</label>
                                    <div class="custom-control custom-checkbox d-inline-block align-middle">
                                        <input type="checkbox" class="custom-control-input -checkbox" name="status['hienthi']" id="-checkbox" <?=(@$item['status'] == 'hienthi') ? 'checked' : ''?> value="hienthi">
                                        <label for="<?=$key?>-checkbox" class="custom-control-label"></label>
                                    </div>
                                </div>
                        </div>
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-body card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                        <div class="tab-pane fade show active" id="tabs-lang-" role="tabpanel" aria-labelledby="tabs-lang">
                                            <div class="form-group">
                                                <label for="name">Tiêu đề :</label>
                                                <input type="text" class="form-control for-seo text-sm" name="data[name]" id="name" placeholder="Tiêu đề " value="<?=(!empty($flash->has('name'))) ? $flash->get('name') : @$item['name']?>" required>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?=$colRight?>">
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh danh mục</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                /* Photo detail */
                                $photoDetail = array();
                                $photoDetail['upload'] = "upload/product";
                                $photoDetail['image'] = (!empty($item)) ? $item['photo'] : '';
                                $photoDetail['dimension'] = "Width: 60px - Height: 60px ('.jpg|.gif|.png|.jpeg|.gif')";
                                $photoDetail['width'] = "60";
                                $photoDetail['height'] = "60";

                                /* Image */
                                include TEMPLATE.LAYOUT."image.php";
                            ?>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>