<?php
	if($act=="add") $labelAct = "Thêm mới";
	else if($act=="edit") $labelAct = "Chỉnh sửa";

	$linkMan = "index.php?source=warehouse&act=man";
	if($act=='add') $linkFilter = "index.php?source=warehouse&act=add";
	else if($act=='edit') $linkFilter = "index.php?source=warehouse&act=edit"."&id=".$id;
    $linkSave = "index.php?source=warehouse&act=save";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active"><?=$labelAct?> đơn hàng nhập</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <?=$flash->getMessages('admin')?>
        <div class="row">
            <div class="col-xl-12">

                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung đơn hàng nhập</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                    <li class="nav-item">
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
								<div class="tab-pane fade show active" id="tabs-lang-vi"
                                        role="tabpanel" aria-labelledby="tabs-lang">
                                        <div class="form-group">
                                            <label for="name">Mã đơn hàng:</label>
                                            <input type="text" class="form-control for-seo text-sm"
                                                name="data[code_invoice]" id="code_invoice"
                                                placeholder="Mã đơn hàng"
                                                value="<?=(!empty($flash->has('code_invoice'))) ? $flash->get('code_invoice') : @$item['code_invoice']?>"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tiêu đề:</label>
                                            <input type="text" class="form-control for-seo text-sm"
                                                name="data[name_invoice]" id="name_invoice"
                                                placeholder="Tiêu đề"
                                                value="<?=(!empty($flash->has('name_invoice'))) ? $flash->get('name_invoice') : @$item['name_invoice']?>"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">File sản phẩm:</label>
                                            <input type="file" class="form-control for-seo text-sm"
                                                name="file_product" id="file_product"
                                                placeholder="File sản phẩm"
                                                value="<?=(!empty($flash->has('name_invoice'))) ? $flash->get('name_invoice') : @$item['name_invoice']?>"
                                                required>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>