<?php
if ($act == "add")
    $labelAct = "Thêm mới";
else if ($act == "edit")
    $labelAct = "Chỉnh sửa";

$linkMan = "index.php?source=warehouse&act=man";
if ($act == 'add')
    $linkFilter = "index.php?source=warehouse&act=add";
else if ($act == 'edit')
    $linkFilter = "index.php?source=warehouse&act=edit" . "&id=" . $id;
$linkSave = "index.php?source=warehouse&act=save";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">
                    <?= $labelAct ?> đơn hàng nhập
                </li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <?= $flash->getMessages('admin') ?>
    <div class="row">
        <div class="col-xl-12">
        <div class="card-header">
            <h3 class="card-title">Danh sách sản phẩm</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="align-middle text-center" width="10%">STT</th>
						<th class="align-middle">Mã sản phẩm</th>
						<th class="align-middle" style="width:30%">Tên sản phẩm</th>
						<th class="align-middle">Giá nhập</th>
						<th class="align-middle">Giá bán lẻ</th>
						<th class="align-middle">Số lượng nhập</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) { 
                            $itemProduct = $d->rawQueryOne("select * from product where sku = ? limit 1",array($items[$i]['sku']));
                        ?>
                            <tr>
                                <td class="align-middle">
                                    <input type="number" class="form-control form-control-mini m-auto update-numb" min="0" value="<?=$i+1?>" data-id="<?=$items[$i]['id']?>" data-table="product">
                                </td>
                                <td class="align-middle">
                                    <span class="text-dark text-break"><?=$items[$i]['sku']?></span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-dark text-break"><?=$itemProduct['name']?></span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-dark text-break"><?=$items[$i]['import_price']?></span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-dark text-break"><?=$items[$i]['retail_price']?></span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-dark text-break"><?=$items[$i]['quantity']?></span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
        </div>
    </div>
</section>