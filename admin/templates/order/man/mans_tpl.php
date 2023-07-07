<?php
    $linkMan = $linkFilter = "index.php?source=order&act=man";
    $linkEdit = "index.php?source=order&act=edit";
    $linkDelete = "index.php?source=order&act=delete";
    $linkExcel = "index.php?source=excelAll";
    $linkWord = "index.php?source=wordAll";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý đơn hàng</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-bag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-primary font-weight-bold text-capitalize text-sm">Mới đặt</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold"><?=$allNewOrder?></span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?=$func->formatMoney($totalNewOrder)?></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-info font-weight-bold text-capitalize text-sm">Đã xác nhận</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold"><?=$allConfirmOrder?></span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?=$func->formatMoney($totalConfirmOrder)?></span></p>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-success font-weight-bold text-capitalize text-sm">Đã giao</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold"><?=$allDeliveriedOrder?></span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?=$func->formatMoney($totalDeliveriedOrder)?></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-danger font-weight-bold text-capitalize text-sm">Đã hủy</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold"><?=$allCanceledOrder?></span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?=$func->formatMoney($totalCanceledOrder)?></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-sm sticky-top">
        <div class="form-inline form-search d-inline-block align-middle">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="<?=(isset($_GET['keyword'])) ? $_GET['keyword'] : ''?>" onkeypress="doEnter(event,'keyword','<?=$linkMan?>')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','<?=$linkMan?>')">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title card-title-order d-inline-block align-middle float-none">Danh sách đơn hàng</h3>
            <?php if(isset($config['order']['excelall']) && $config['order']['excelall'] == true) { ?>
                <a class="btn btn-sm bg-gradient-success btn-export-excel btn-sm d-inline-block align-middle ml-2 text-white" onclick="actionOrder('<?=$linkExcel?>')" title="Xuất file Excel"><i class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
            <?php } ?>
            <?php if(isset($config['order']['wordall']) && $config['order']['wordall'] == true) { ?>
                <a class="btn btn-sm bg-gradient-primary btn-export-word btn-sm d-inline-block align-middle ml-2 text-white" onclick="actionOrder('<?=$linkWord?>')" title="Xuất file Word"><i class="far fa-file-word mr-1"></i>Xuất file Word</a>
            <?php } ?>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" width="5%">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <?php /* ?><th class="align-middle text-center" width="10%">STT</th><?php */ ?>
                        <th class="align-middle">Mã đơn hàng</th>
                        <th class="align-middle" style="width:15%">Họ tên</th>
                        <th class="align-middle">Ngày đặt</th>
                        <th class="align-middle">Tổng giá</th>
                        <th class="align-middle">HÌnh thức thanh toán</th>
                        <th class="align-middle">Tình trạng</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) { ?>
                            <tr>
                                <td class="align-middle">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?=$items[$i]['id']?>" value="<?=$items[$i]['id']?>">
                                        <label for="select-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <?php /* ?>
                                    <td class="align-middle">
                                        <input type="number" class="form-control form-control-mini m-auto update-numb" min="0" value="<?=$items[$i]['numb']?>" data-id="<?=$items[$i]['id']?>" data-table="order">
                                    </td>
                                <?php */ ?>
                                <td class="align-middle">
                                    <a class="text-primary" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['code']?>"><?=$items[$i]['code']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-primary" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['fullname']?>"><?=$items[$i]['fullname']?></a>
                                </td>
                                <td class="align-middle"><?=date("h:i:s A - d/m/Y", $items[$i]['date_created'])?></td>
                                <td class="align-middle">
                                    <span class="text-danger font-weight-bold"><?=$func->formatMoney($items[$i]['total_price'])?></span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-danger font-weight-bold"><?=$items[$i]['order_payment']?></span>
                                </td>
                                <td class="align-middle">
                                    <?php $arr_status = array("Mới đặt","Đã Xác Nhận","Đã Giao","Đã Hủy"); ?>
                                    <span class="text-capitalize"><?=$arr_status[$items[$i]['order_status'] - 1]?></span>
                                </td>
                                <td class="align-middle text-center text-md text-nowrap">
                                    <a class="text-primary mr-2" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                    <a class="text-danger" id="delete-item" data-url="<?=$linkDelete?>&id=<?=$items[$i]['id']?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($paging) { ?>
        <div class="card-footer text-sm pb-0">
            <?=$paging?>
        </div>
    <?php } ?>
    <div class="card-footer text-sm">
    </div>
</section>